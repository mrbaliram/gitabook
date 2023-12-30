<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest; 
use Illuminate\Support\Facades\DB;     

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Author::orderBy('created_at', 'DESC')->paginate(10);
        
        return view('authors.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = null;
        return view('authors.create', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $author = new Author();
        $author->name = $validatedData['name'];
        $author->status = $validatedData['status'];
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Author created successfully');
    }
    // public function store(StoreAuthorRequest $request)
    // {
        
    //     $author = new Author();
    //     $author->name = $request->input('name');
    //     $author->status = $request->input('status');
    //     $author->save();
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Author::find($id);
        return view('authors.create', ['results' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $author->name = $validatedData['name'];
        $author->status = $validatedData['status'];
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $author = Author::findOrFail($id);
         $author->delete();
         return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
