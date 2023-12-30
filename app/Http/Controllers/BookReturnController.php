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
use App\Models\Book_return;
use App\Http\Requests\StoreBook_ReturnRequest;
use App\Http\Requests\UpdateBook_ReturnRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class BookReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request['search'] != null){
            $searchVal = $request['search'];            
            $results = DB::table('book_returns')
            ->select('book_returns.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->where(function($query) use ($searchVal) {
                $query->where('books.name', 'like', '%' . $searchVal . '%')
                ->orWhere('books.price', 'like', '%' . $searchVal . '%')
                ->orWhere('languages.name', 'like', '%' . $searchVal . '%')
                ->orWhere('users.name', 'like', '%' . $searchVal . '%');
            })->orderBy('books.name', 'ASC')
            ->paginate();

        }else{
         $results = DB::table('book_returns')
            ->select('book_returns.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->orderBy('books.name', 'ASC')
            ->paginate(10);
        }
        return view('book_return.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $userResult = User::all();
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        
        $results = DB::table('book_returns')
            ->select('book_returns.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->orderBy('book_returns.created_at', 'DESC')
            ->limit(10)->get();


        return view('book_return.create', ['bookResult' => $bookResult,'userResult' => $userResult, 'languageResults' => $languageResults, 'results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook_ReturnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'returned_quantity' => 'required|string|max:255',
            'book_id' => 'required|string|max:255',
            'volunteer_id' => 'required|string|max:255',
            'returned_date' => 'required|string|max:255',
        ]);
 
        $book = new Book_return();
        $book->remarks = $request['remarks'];
        $book->returned_quantity = $validatedData['returned_quantity'];
        $book->book_id = $validatedData['book_id'];
        $book->volunteer_id = $validatedData['volunteer_id'];
        $book->returned_date = $validatedData['returned_date'];        
        $book->save();
        
        // return redirect()->route('Book_Return.index')->with('success', 'Book created successfully');

        $successMsg = "Book issued successfully!";
        
        $results = DB::table('book_returns')
            ->select('book_returns.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->orderBy('book_returns.created_at', 'DESC')
            ->limit(10)->get();
            
        if($request['saveBtn'] != null){
            return redirect()->route('Book_Return.index')->with('success', $successMsg);
        }else{

            return redirect()->route('Book_Return.create')->with( [
                    'success'=>$successMsg,
                    'results' => $results,
                    'session_book_id' => $request['book_id'], 
                    'session_volunteer_id' => $request['volunteer_id'], 
                    'session_language_id' => $request['language_id'],
                    'session_qty' => $request['issued_quantity']
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_Return  $book_Return
     * @return \Illuminate\Http\Response
     */
    public function show(Book_Return $book_Return)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_Return  $book_Return
     * @return \Illuminate\Http\Response
     */
    // public function edit(Book_Return $book_Return)
    // {
    //     //
    // }

     public function edit($id)
    {
        $userResult = User::all();
        //$bookResult = Book::all();
        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();
        $bookReturnResult = Book_return::find($id);
        return view('book_return.edit', ['bookReturnResult' => $bookReturnResult, 'bookResult' => $bookResult, 'userResult' => $userResult]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBook_ReturnRequest  $request
     * @param  \App\Models\Book_Return  $book_Return
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $book = Book_return::findOrFail($id);
        $validatedData = $request->validate([
            //'remarks' => 'required|string|max:255',
            'returned_quantity' => 'required|string|max:255',
            // 'book_id' => 'required|string|max:255',
            // 'volunteer_id' => 'required|string|max:255',
            'returned_date' => 'required|string|max:255',
        ]);
             
        $book->remarks = $request['remarks'];
        $book->returned_quantity = $validatedData['returned_quantity'];
        // $book->book_id = $validatedData['book_id'];
        //$book->volunteer_id = $validatedData['volunteer_id'];
        $book->returned_date = $validatedData['returned_date'];
        $book->save();
        return redirect()->route('Book_Return.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_Return  $book_Return
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        //
        $book = Book_return::findOrFail($id);
        $book->delete();
        return redirect()->route('Book_Return.index')->with('success', 'Book deleted successfully');
    }
    ///Book_Return/"+ $varVolunteerId +"/get_book_base_on_volunteer" getBookBaseOnVolunteer
    public function getBookBaseOnVolunteer($volunteer_id)
    {

             $results = DB::table('book_issues')
            ->select('book_issues.book_id','book_issues.issued_quantity','books.language_id as bookLangId','books.name as bookName', 'books.price as bookPrice' ,'languages.name as langName','authors.name as authName')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->where('book_issues.volunteer_id', '=', $volunteer_id)
            ->get();

            //dd($results);
            return Response::json( $results );
        //} 
    }
    public function getIssueBookBaseOnVolunteer($bookid, $volunteer_id)
    {
        $results = DB::table('book_issues')
        ->select('book_issues.book_id','book_issues.issued_quantity','books.language_id as bookLangId','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName')
        ->join('books','books.id','=','book_issues.book_id')
        ->join('languages','languages.id','=','books.language_id')
        ->join('authors','authors.id','=','books.author_id')
        ->where('book_issues.volunteer_id', '=', $volunteer_id)
        ->where('book_issues.book_id', '=', $bookid)
        ->get();
        //dd($results);
        return Response::json( $results );
    }
    
    public function getReturnBookBaseOnVolunteer($bookid, $volunteer_id)
    {
        
        $results = DB::table('book_returns')
        ->select('book_returns.book_id','book_returns.returned_quantity','books.language_id as bookLangId','books.name as bookName', 'books.price as bookPrice','languages.name as langName','authors.name as authName')
        ->join('books','books.id','=','book_returns.book_id')
        ->join('languages','languages.id','=','books.language_id')
        ->join('authors','authors.id','=','books.author_id')
        ->where('book_returns.volunteer_id', '=', $volunteer_id)
        ->where('book_returns.book_id', '=', $bookid)
        ->get();
        //dd($results);
        return Response::json( $results );
    }
    //getSellBookBaseOnVolunteer
    public function getSellBookBaseOnVolunteer($bookid, $volunteer_id)
    {
        
        $results = DB::table('book_sells')
        ->select('book_sells.book_id','book_sells.soled_quantity','books.language_id as bookLangId','books.name as bookName','languages.name as langName','authors.name as authName')
        ->join('books','books.id','=','book_sells.book_id')
        ->join('languages','languages.id','=','books.language_id')
        ->join('authors','authors.id','=','books.author_id')
        ->where('book_sells.volunteer_id', '=', $volunteer_id)
        ->where('book_sells.book_id', '=', $bookid)
        ->get();
        //dd($results);
        return Response::json( $results );
    }
    
}
