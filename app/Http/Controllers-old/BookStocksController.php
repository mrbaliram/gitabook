<?php

namespace App\Http\Controllers;


use App\Models\Book_stocks;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;


use App\Http\Requests\StoreBook_stocksRequest;
use App\Http\Requests\UpdateBook_stocksRequest;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\DB;

class BookStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request['search'] != null){
            $searchVal = $request['search'];

            $results = DB::table('book_stocks')
                ->select('book_stocks.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName')
                ->join('books','books.id','=','book_stocks.book_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('authors','authors.id','=','books.author_id')
                ->where(function($query) use ($searchVal) {
                    $query->where('books.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('books.price', 'like', '%' . $searchVal . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchVal . '%');
                })
                ->orderBy('book_stocks.created_at', 'DESC')
                ->paginate();

        }else{
            
            $results = DB::table('book_stocks')
                ->select('book_stocks.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName')
                ->join('books','books.id','=','book_stocks.book_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('authors','authors.id','=','books.author_id')
                ->orderBy('book_stocks.created_at', 'DESC')
                ->paginate(10);
        }
        return view('book_stock.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bookResult = Book::all();
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();
        return view('book_stock.create', ['bookResult' => $bookResult,'languageResults' => $languageResults]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook_stocksRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreBook_stocksRequest $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            //'remarks' => 'required|string|max:255',
            'received_quantity' => 'required|string|max:255',
            'book_id' => 'required|string|max:255',
            'received_date' => 'required|string|max:255',
        ]);
 
        $book = new Book_stocks();
        //$book->remarks = $validatedData['remarks'];
        $book->remarks = $request['remarks'];
        $book->received_quantity = $validatedData['received_quantity'];
        $book->book_id = $validatedData['book_id'];
        $book->received_date = $validatedData['received_date'];
        $book->save();
        
        return redirect()->route('Book_stocks.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_stocks  $book_stocks
     * @return \Illuminate\Http\Response
     */
    public function show(Book_stocks $book_stocks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_stocks  $book_stocks
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
            ->get();
        
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $bookStockResult = Book_stocks::find($id);
        // get book language and send to edit page to select it
        $getBookLang = DB::table('books')
            ->select('books.language_id')
            ->where('id', '=', $bookStockResult->book_id)->get();

        $getBookDetails = Book::find($bookStockResult->book_id);
        //$getBookLang = $getBookLang->language_id;

        return view('book_stock.edit', ['bookStockResult' => $bookStockResult, 'bookResult' => $bookResult, 'languageResults' => $languageResults, 'getBookDetails' => $getBookDetails]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBook_stocksRequest  $request
     * @param  \App\Models\Book_stocks  $book_stocks
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateBook_stocksRequest $request, Book_stocks $book_stocks)
     public function update(Request $request, $id)
    {
        //

        $book = Book_stocks::findOrFail($id);
        $validatedData = $request->validate([
            'received_quantity' => 'required|string|max:255',
            'book_id' => 'required|string|max:255',
            'received_date' => 'required|string|max:255',
        ]);
        
        $book->remarks = $request['remarks'];
        $book->received_quantity = $validatedData['received_quantity'];
        $book->book_id = $validatedData['book_id'];
        $book->received_date = $validatedData['received_date'];

        $book->save();
        return redirect()->route('Book_stocks.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_stocks  $book_stocks
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        //
        $book = Book_stocks::findOrFail($id);
        $book->delete();
        return redirect()->route('Book_stocks.index')->with('success', 'Record deleted successfully');
    }

    public function getBooksIssueToVolunteer($id)
    {
        $result = DB::table('book_issues')
            ->select('book_id','issued_quantity')
            ->where('book_id', '=', $id)->get();
        return Response::json( $result );
    }

     // ajax call
    public function getBookBasedOnLanuage($langId)
    {
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
            ->orderBy('books.name', 'ASC')
            ->where('books.language_id', '=', $langId)
            ->get();
        return Response::json( $bookResult );
    }
}
