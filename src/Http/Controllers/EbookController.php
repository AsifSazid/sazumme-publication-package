<?php

namespace SazUmme\Publication\Http\Controllers;

use SazUmme\Publication\Models\Ebook;
use Illuminate\Support\Facades\Auth;

class EbookController extends PublicationBaseController
{
    public function myEbooks()
    {
        return view('publication::backend.ebooks.my-ebooks');
    }

    public function index()
    {
        $user = Auth::user();
        $roleId = isset($user->roles['0']->id);
        if ($roleId == 1) {
            // dd('Admin');
            $blogCollection = Ebook::latest();
        } else {
            // dd('Not Admin');
            $blogCollection = Ebook::where('written_by_uuid', $user->uuid)->latest();
        }
        $ebooks = $blogCollection->paginate(10);
        return view('publication::backend.admin.ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        return view('backend.ebooks.create');
    }

    public function store(Request $request)
    {
        $request['is_active'] = $request->has('is_active') ? 1 : 0;

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $ebook = Ebook::create([
                'uuid' => (string) \Str::uuid(),
                'title' => $request->title,
                'body' => $request->body,
                'written_by' => Auth::user()->id,
                'written_by_uuid' => Auth::user()->uuid,
                'is_active' => $request->has('is_active'),
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');

                $ebook->image()->create([
                    'uuid' => (string) \Str::uuid(),
                    'url' => $path,
                ]);
            }

            return redirect()->route('admin.ebooks.index')->with('success', 'Ebook created successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function show($ebook)
    {
        $ebook = Ebook::where('uuid', $ebook)->first();
        return view('backend.ebooks.show', compact('ebook'));
    }

    public function edit($ebook)
    {
        $ebook = Ebook::where('uuid', $ebook)->first();
        return view('backend.ebooks.edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $request['is_active'] = $request->has('is_active') ? 1 : 0;

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $ebook->update([
                'title' => $request->title,
                'body' => $request->body,
                'written_by' => Auth::user()->id,
                'written_by_uuid' => Auth::user()->uuid,
                'is_active' => $request->has('is_active'),
            ]);

            if ($request->hasFile('image')) {
                // Delete previous image if exists
                if ($ebook->image) {
                    Storage::disk('public')->delete($ebook->image->url);
                    $ebook->image()->delete();
                }

                // Store new image
                $path = $request->file('image')->store('images', 'public');
                $ebook->image()->create([
                    'uuid' => (string) \Str::uuid(),
                    'url' => $path,
                ]);
            }

            return redirect()->route('admin.ebooks.index')->with('success', 'Ebook updated successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($uuid)
    {
        $ebook = Ebook::where('uuid', $uuid);
        $ebook->delete(); // this is soft delete

        return redirect()->route('admin.ebooks.index')->with('success', 'Ebook moved to trash.');
    }

    public function trash()
    {
        $trashedCollection = Ebook::onlyTrashed()->latest();
        $trashed = $trashedCollection->paginate(10);
        return view('backend.ebooks.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $ebook = Ebook::onlyTrashed()->where('uuid', $uuid);
        $ebook->restore();

        return redirect()->route('admin.ebooks.trash')->with('success', 'Ebook restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $ebook = Ebook::onlyTrashed()->where('uuid', $uuid);
        $ebook->forceDelete();

        return redirect()->route('admin.ebooks.trash')->with('success', 'Ebook permanently deleted.');
    }

    public function getData(Request $request)
    {
        $user = Auth::user();
        $roleId = isset($user->roles['0']->id);
        if ($roleId == 1) {
            // dd('Admin');
            $query = Ebook::where('is_active', '1')->with('user');
        } else {
            // dd('Not Admin');
            $query = Ebook::where('written_by_uuid', $user->uuid)->with('user');
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $ebooks = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json($ebooks);
    }

    public function downloadPdf(Request $request)
    {
        $header = "Ebook List(s)";

        $search = $request->get('search');

        $user = Auth::user();
        $roleId = isset($user->roles['0']->id);
        if ($roleId == 1) {
            // dd('Admin');
            $query = Ebook::where('is_active', '1')->with('user');
        } else {
            // dd('Not Admin');
            $query = Ebook::where('written_by_uuid', $user->uuid)->with('user');
        }

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
            $header = "Ebook List(s) - Filtered";
        }

        $ebooks = $query->get();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader("<div style='text-align:center'>{$header}</div>");
        $mpdf->SetFooter("This is a system generated document(s). So no need to show external signature or seal!");
        $view = view('backend.ebooks.pdf', compact('ebooks'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
