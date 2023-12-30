<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest; 
use Illuminate\Support\Facades\DB;     

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Invoice::orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = null;
        $temp_invoice_date = date('Y-m-d');
        return view('invoice.add_edit', ['results' => $results,'temp_invoice_date' => $temp_invoice_date]);
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
            'invoice_number' => 'required|string|max:255',
            'invoice_date' => 'required|string|max:255',
            'shipping_addres' => 'required|string|max:255',
            'total_amount' => 'required|string|max:255',
            'total_qty' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        $Invoice = new Invoice();
        $Invoice->invoice_number = $validatedData['invoice_number'];
        $Invoice->invoice_date = $validatedData['invoice_date'];
        $Invoice->shipping_addres = $validatedData['shipping_addres'];
        $Invoice->total_amount = $validatedData['total_amount'];
        $Invoice->total_qty = $validatedData['total_qty'];
        $Invoice->status = $validatedData['status'];
        $Invoice->remarks = $request['remarks'];
        $Invoice->save();
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully');
    }
   
   // invoice_number   
   // invoice_date 
   // shipping_addres
   // total_amount
   // total_qty

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
        $temp_invoice_date = date('Y-m-d');
        $results = Invoice::find($id);
        //dd($results->invoice_date);
        $temp_invoice_date = $results->invoice_date;
        return view('invoice.add_edit', ['results' => $results,'temp_invoice_date' => $temp_invoice_date]);
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
        $Invoice = Invoice::findOrFail($id);

        $validatedData = $request->validate([
            'invoice_number' => 'required|string|max:255',
            'invoice_date' => 'required|string|max:255',
            'shipping_addres' => 'required|string|max:255',
            'total_amount' => 'required|string|max:255',
            'total_qty' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
        
        $Invoice->invoice_number = $validatedData['invoice_number'];
        $Invoice->invoice_date = $validatedData['invoice_date'];
        $Invoice->shipping_addres = $validatedData['shipping_addres'];
        $Invoice->total_amount = $validatedData['total_amount'];
        $Invoice->total_qty = $validatedData['total_qty'];
        $Invoice->status = $validatedData['status'];
        $Invoice->remarks = $request['remarks'];
        $Invoice->save();

        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $author = Invoice::findOrFail($id);
         $author->delete();
         return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully');
    }
}
