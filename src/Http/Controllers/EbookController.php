<?php

namespace SazUmme\Publication\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use SazUmme\Publication\Models\Ebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EbookController extends PublicationBaseController
{
    public function myEbooks()
    {
        return view('publication::backend.ebooks.my-ebooks');
    }

    public function index()
    {
        return view('backend.ebooks.index');
    }

    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('backend.ebooks.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ebook_file' => 'required|file|mimes:pdf,epub|max:51200', // 50MB max
            'price' => 'required|numeric|min:0',
            'page_count' => 'nullable|integer|min:1',
            'category' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        DB::beginTransaction();

        try {
            $ebook = Ebook::create([
                'uuid' => (string) \Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'price' => $request->price,
                'page_count' => $request->page_count,
                'is_active' => $request->has('is_active'),
                'created_by' => Auth::user()->id
            ]);

            // $ebook->categories()->attach($request->category); // Many-to-many

            // if ($request->filled('tags')) {
            //     $ebook->tags()->attach($request->tags);
            // }

            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('ebooks/images', 'public');

                $ebook->image()->create([
                    'uuid' => (string) \Str::uuid(),
                    'url' => $imagePath,
                ]);
            }

            if ($request->hasFile('ebook_file')) {
                $filePath = $request->file('ebook_file')->store('ebooks/files', 'public');

                $ebook->file()->create([
                    'uuid' => (string) \Str::uuid(),
                    'url' => $filePath,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.ebooks.index')->with('success', 'Ebook created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
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
        // $query = Ebook::with('creator');
        $query = Ebook::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $announcements = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json($announcements);
    }

    public function downloadPdf(Request $request)
    {
        $search = $request->get('search');

        $query = Ebook::query();

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $announcements = $query->get();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader("<div style='text-align:center'>Ebook List!</div>");
        $mpdf->SetFooter("This is a system generated document(s). So no need to show external signature or seal!");
        $view = view('backend.announcements.pdf', compact('announcements'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
