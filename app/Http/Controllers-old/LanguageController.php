<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Support\Facades\DB; 

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = Language::orderBy('name', 'asc')->paginate(10);
        return view('language.index', compact('results'));
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
        return view('language.create', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreLanguageRequest $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $language = new Language();
        $language->name = $validatedData['name'];
        $language->status = $validatedData['status'];
        $language->save();
        return redirect()->route('language.index')->with('success', 'Language created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $results = Language::find($id);
        return view('language.create', ['results' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateLanguageRequest $request, Language $language)
    // {
    //     //
    // }

     public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $language->name = $validatedData['name'];
        $language->status = $validatedData['status'];
        $language->save();
        return redirect()->route('language.index')->with('success', 'Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $language = Language::findOrFail($id);
         $language->delete();
         return redirect()->route('language.index')->with('success', 'Language deleted successfully');
    }
}
