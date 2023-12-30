<?php

namespace App\Http\Controllers;
use App\Models\Book_stocks;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;

use App\Models\Category;
use App\Models\Language;
use App\Models\Book_issue;
use App\Models\Book_Return;
use App\Models\Book_sell;
use App\Http\Requests\StoreBook_sellRequest;
use App\Http\Requests\UpdateBook_sellRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
class BookSellController extends Controller
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
            $results = DB::table('book_sells')
                ->select('book_sells.*','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
                ->join('books','books.id','=','book_sells.book_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('authors','authors.id','=','books.author_id')
                ->join('users','users.id','=','book_sells.volunteer_id')
                ->where(function($query) use ($searchVal) {
                    $query->where('books.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('books.price', 'like', '%' . $searchVal . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('users.name', 'like', '%' . $searchVal . '%');
                })->orderBy('books.created_at', 'ASC')
                ->paginate();

        }else{

            $results = DB::table('book_sells')
                ->select('book_sells.*','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
                ->join('books','books.id','=','book_sells.book_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('authors','authors.id','=','books.author_id')
                ->join('users','users.id','=','book_sells.volunteer_id')
                ->orderBy('books.created_at', 'ASC')
            ->paginate(10);
        }
        return view('book_sell.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userResult = User::all();
        $bookResult = Book::all();
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();

        return view('book_sell.create', ['bookResult' => $bookResult,'userResult' => $userResult, 'languageResults' => $languageResults]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook_sellRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //volunteer_id
        $validatedData = $request->validate([
            'volunteer_id' => 'required|string|max:255',
            'book_id' => 'required|string|max:255',
            'soled_quantity' => 'required|string|max:255',
            'soled_date' => 'required|string|max:255',
        ]);
        
        $book = new Book_sell();
        //$book->remarks = $validatedData['remarks'];
        
        $book->soled_quantity = $validatedData['soled_quantity'];
        $book->book_id = $validatedData['book_id'];
        $book->volunteer_id = $validatedData['volunteer_id'];
        $book->soled_date = $validatedData['soled_date'];
        //price name phone address
        $book->soled_price = $request['soled_price'];
        $book->price = $request['price'];
        $book->name = $request['name'];
        $book->phone = $request['remarks'];
        $book->address = $request['address'];
        $book->remarks = $request['remarks'];
        $book->save();
        
        return redirect()->route('Book_Sell.index')->with('success', 'Book Sell created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_sell  $book_sell
     * @return \Illuminate\Http\Response
     */
    public function show(Book_sell $book_sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_sell  $book_sell
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userResult = User::all();
       
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();
        $bookSellResult = Book_sell::find($id);
        return view('book_sell.edit', ['bookSellResult' => $bookSellResult, 'bookResult' => $bookResult, 'userResult' => $userResult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBook_sellRequest  $request
     * @param  \App\Models\Book_sell  $book_sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $book = Book_sell::findOrFail($id);
        $validatedData = $request->validate([
            'soled_quantity' => 'required|string|max:255',
            'soled_date' => 'required|string|max:255',
        ]);
             
        $book->soled_quantity = $validatedData['soled_quantity'];
        $book->soled_date = $validatedData['soled_date'];
        //price name phone address
        $book->soled_price = $request['soled_price'];
        $book->price = $request['price'];
        $book->name = $request['name'];
        $book->phone = $request['phone'];
        $book->address = $request['address'];
        $book->remarks = $request['remarks'];

        $book->save();

        return redirect()->route('Book_Sell.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_sell  $book_sell
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book_sell::findOrFail($id);
        $book->delete();
        return redirect()->route('Book_Sell.index')->with('success', 'Book deleted successfully');
    }
}
