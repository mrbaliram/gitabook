<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book_stocks;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book_issue;
use App\Http\Requests\StoreBook_issueRequest;
use App\Http\Requests\UpdateBook_issueRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class BookIssueController extends Controller
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
            
            $results = DB::table('book_issues')
                ->select('book_issues.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
                ->join('books','books.id','=','book_issues.book_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('authors','authors.id','=','books.author_id')
                ->join('users','users.id','=','book_issues.volunteer_id')
                ->where(function($query) use ($searchVal) {
                    $query->where('books.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('books.price', 'like', '%' . $searchVal . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('users.name', 'like', '%' . $searchVal . '%');
                })
                ->orderBy('book_issues.created_at', 'DESC')
                ->paginate();
        }else{
             $results = DB::table('book_issues')
           ->select('book_issues.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_issues.volunteer_id')
            ->orderBy('book_issues.created_at', 'DESC')
        ->paginate(10);
        }
        
         //$results = Book_issue::paginate(10);
        //dd($results);
        return view('book_issue.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = DB::table('book_issues')
           ->select('book_issues.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_issues.volunteer_id')
            ->orderBy('book_issues.created_at', 'DESC')
            ->limit(10)
            ->get();

        $userResult = User::all();
        //$bookResult = Book::all();
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $bookResult = DB::table('books')
            ->select(
                'books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName'
                ,DB::raw('(SELECT sum(received_quantity) FROM book_stocks WHERE book_stocks.book_id = books.id) as totalStock')
                ,DB::raw('(SELECT sum(issued_quantity) FROM book_issues WHERE book_issues.book_id = books.id) as totalIssue')
                ,DB::raw('(SELECT sum(returned_quantity) FROM book_returns WHERE book_returns.book_id = books.id) as totalReturn')
            )
            ->join('authors','authors.id','=','books.author_id')
            ->join('book_stocks','books.id','=','book_stocks.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();

        return view('book_issue.create', ['bookResult' => $bookResult,'userResult' => $userResult, 'languageResults' => $languageResults,'results' => $results]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook_issueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            //volunteer_id
            $validatedData = $request->validate([
                'volunteer_id' => 'required|string|max:255',
                'book_id' => 'required|string|max:255',
                //'remarks' => 'required|string|max:255',
                'issued_quantity' => 'required|string|max:255',
                'issued_date' => 'required|string|max:255',
            ]);

            $book = new Book_issue();
            //$book->remarks = $validatedData['remarks'];
            $book->remarks = $request['remarks'];
            $book->issued_quantity = $validatedData['issued_quantity'];
            $book->book_id = $validatedData['book_id'];
            $book->volunteer_id = $validatedData['volunteer_id'];
            $book->issued_date = $validatedData['issued_date'];
            
            $book->save();

        
        

        $results = DB::table('book_issues')
           ->select('book_issues.*','books.name as bookName','books.id as bookId','books.price as bookPrice','languages.name as langName','authors.name as authName','users.name as volunteerName', 'users.id as userId')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_issues.volunteer_id')
            ->orderBy('book_issues.created_at', 'DESC')
            ->limit(10)
            ->get();

        $successMsg = "Book issued successfully!";
        
        if($request['saveBtn'] != null){
            return redirect()->route('Book_Issue.index')->with('success', $successMsg);
        }else{

            return redirect()->route('Book_Issue.create')->with( [
                    'success'=>$successMsg,
                    'results' => $results,
                    'session_book_id' => $request['book_id'], 
                    'session_volunteer_id' => $request['volunteer_id'], 
                    'session_language_id' => $request['language_id'],
                    'session_qty' => $request['issued_quantity'],
                    'session_issued_date' => $request['issued_date'],
                    'session_remarks' => $request['remarks']
                ]);
        }
        // return redirect()->route('Book_Issue.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function show(Book_issue $book_issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    // public function edit(Book_issue $book_issue)
    // {
    //     //
    // }

     public function edit($id)
    {
        $userResult = User::all();
        //$bookResult = Book::all();
        // $authorsResults = Author::all();
        // $categoryResults = Category::all();
        // $languageResults = Language::all();

        $bookResult = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
        ->get();

        $bookIssueResult = Book_issue::find($id);
        return view('book_issue.edit', ['bookIssueResult' => $bookIssueResult, 'bookResult' => $bookResult, 'userResult' => $userResult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBook_issueRequest  $request
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateBook_issueRequest $request, Book_issue $book_issue)
    // {
    //     //
    // }

     public function update(Request $request, $id)
    {
        //

        $book = Book_issue::findOrFail($id);
        $validatedData = $request->validate([
            // 'volunteer_id' => 'required|string|max:255',
            // 'book_id' => 'required|string|max:255',
            //'remarks' => 'required|string|max:255',
            'issued_quantity' => 'required|string|max:255',
            'issued_date' => 'required|string|max:255',
        ]);
             
        //$book->remarks = $validatedData['remarks'];
        $book->remarks = $request['remarks'];
        $book->issued_quantity = $validatedData['issued_quantity'];
        // $book->book_id = $validatedData['book_id'];
        // $book->volunteer_id = $validatedData['volunteer_id'];
        $book->issued_date = $validatedData['issued_date'];
        $book->save();
        return redirect()->route('Book_Issue.index')->with('success', 'Book updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book_issue::findOrFail($id);
        $book->delete();
        return redirect()->route('Book_Issue.index')->with('success', 'Book deleted successfully');
    }
    
    public function getCurrentBooksAvailable($id)
    {
        //dd($id);
        // if (Request::ajax())
        // {
            $bookStockRes = DB::table('book_stocks')->select('book_id','received_quantity')->where('book_id', '=', $id)->get();
            //dd($bookStockRes);
            return Response::json( $bookStockRes );
        //} 
    }
    public function getBooksIssueToVolunteer($id)
    {
        $result = DB::table('book_issues')
            ->select('book_id','issued_quantity')
            ->where('book_id', '=', $id)->get();
        return Response::json( $result );
    }
    
    public function getBooksReturnByVolunteer($id)
    {
        $result = DB::table('book_returns')
            ->select('book_id','returned_quantity')
            ->where('book_id', '=', $id)->get();
        return Response::json( $result );
    }
}
