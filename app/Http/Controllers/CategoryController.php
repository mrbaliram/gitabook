<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $results = Category::orderBy('created_at', 'DESC')->paginate(10);
        //dd($results);
        return view('category.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $results = null;
        return view('category.create', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreCategoryRequest $request)
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->status = $validatedData['status'];
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //public function edit(Category $category)
    public function edit($id)
    {
        //
        //$id = 0;
         $results = Category::find($id);
         return view('category.create', ['results' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateCategoryRequest $request, Category $category)
    public function update(Request $request, $id)
    {
        //
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $category->name = $validatedData['name'];
        $category->status = $validatedData['status'];
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
