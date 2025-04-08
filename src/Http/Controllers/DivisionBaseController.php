<?php

namespace SazUmme\Publication\Http\Controllers;

use App\Http\Controllers\Controller;
use Baf\Afgl\Afgl\Http\Requests\DivisionRequest;
use Baf\Afgl\Afgl\Models\Division;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
//use another classes

class DivisionBaseController extends Controller
{

    public static $visiblePermissions = [
        'index' => 'List',
        'create' => 'Create Form',
        'store' => 'Save',
        'show' => 'Details',
        'edit' => 'Edit Form',
        'update' => 'Update',
        'destroy' => 'Delete'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afgl::divisions.index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('afgl::divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DivisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        try {
            $division = Division::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('divisions.index')
                ->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            \Log::channel('pondit')->error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(
                config('app.env') == 'production' ? __('Somethings Went Wrong') : $e->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return view('afgl::divisions.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        return view('afgl::divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DivisionRequest  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, Division $division)
    {
        try {
            $division->update($request->all());
            //handle relationship update
            return redirect()->route('divisions.index')
                ->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            \Log::channel('pondit')->error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(
                config('app.env') == 'production' ? __('Somethings Went Wrong') : $e->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        try {
            $division->delete();

            return redirect()->route('divisions.index')
                ->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            \Log::channel('pondit')->error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(
                config('app.env') == 'production' ? __('Somethings Went Wrong') : $e->getMessage()
            );
        }
    }

    public function getData()
    {
        /*Variables*/
        $paginatePerPage = \request('rows_per_page') ?? 10;
        $query = new Division;
        /*Filtering by column*/
        if ($filterableColumns = \request('filterable_columns')) {
            $columns = explode('|', $filterableColumns);
            foreach ($columns as $column) {
                $columnArray = explode('=>', $column);
                $columnName = $columnArray[0] ?? null;
                $columnValue = $columnArray[1] ?? null;
                
                if ($columnName && $columnValue) {
                    
                    if($columnName == 'created_at_from'){
                        $query = $query->whereDate('created_at', '>=', $columnValue);
                        continue;
                    }

                    if($columnName == 'created_at_to'){
                        $query = $query->whereDate('created_at', '<=', $columnValue);
                        continue;
                    }

                    if(substr($columnName, -5) == '_like'){
                        $columnName = substr($columnName, 0, -5);
                        $query = $query->whereRaw("LOWER(`{$columnName}`) LIKE ? ", "%{$columnValue}%");
                        continue;
                    }
                    
                    $query = $query->where($columnName, $columnValue);

                }
                
            }
        }
        /////////////////////////

        $query = $query->orderBy('id', 'desc');
        $data = $query->paginate($paginatePerPage);
        $dataArray = $data->toArray();

        return response()->json([
            'records' => $data,
            'pages' => $this->getPages($dataArray['current_page'], $dataArray['last_page'], $dataArray['total']),
            'sl' => !is_null(\request()->page) ? (\request()->page -1) * $paginatePerPage : 0
        ]);
    }

    private function getPages($currentPage, $lastPage, $totalPages)
    {
        $startPage = ($currentPage < 5)? 1 : $currentPage - 4;
        $endPage = 8 + $startPage;
        $endPage = ($totalPages < $endPage) ? $totalPages : $endPage;
        $diff = $startPage - $endPage + 8;
        $startPage -= ($startPage - $diff > 0) ? $diff : 0;
        $pages = [];

        if ($startPage > 1) {
            $pages[] = '...';
        }

        for ($i=$startPage; $i<=$endPage && $i<=$lastPage; $i++) {
            $pages[] = $i;
        }

        if ($currentPage < $lastPage) {
            $pages[] = '...';
        }

        return $pages;
    }
//another methods
}
