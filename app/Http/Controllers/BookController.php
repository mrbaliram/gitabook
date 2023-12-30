<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book_issue;
use App\Models\Book_stocks;
use App\Models\Book_Return;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
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
            $results = DB::table('books')
                ->select('books.*','authors.name as authorName',
                    'languages.name as languageName',
                    'categories.name as categoriesName')
                ->join('authors','authors.id','=','books.author_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('categories','categories.id','=','books.category_id')
                ->where(function($query) use ($searchVal) {
                    $query->where('books.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('books.price', 'like', '%' . $searchVal . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchVal . '%')
                    ->orWhere('categories.name', 'like', '%' . $searchVal . '%');
                })
                ->orderBy('created_at', 'DESC')
                ->paginate();
        }else{
            $results = DB::table('books')
                ->select('books.*','authors.name as authorName',
                    'languages.name as languageName',
                    'categories.name as categoriesName')
                ->join('authors','authors.id','=','books.author_id')
                ->join('languages','languages.id','=','books.language_id')
                ->join('categories','categories.id','=','books.category_id')                
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }
    return view('book.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $results = null;
        $authorsResults = Author::all();
        $categoryResults = Category::all();
        $languageResults = Language::all();

        return view('book.create', ['results' => $results,'authorsResults' => $authorsResults, 'categoryResults' => $categoryResults,'languageResults' => $languageResults]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    

     public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'language_id' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'author_id' => 'required|string|max:255',            
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);
 
        $book = new Book();
        $book->name = $validatedData['name'];
        $book->price = $validatedData['price'];
        $book->author_id = $validatedData['author_id'];
        $book->category_id = $validatedData['category_id'];
        $book->language_id = $validatedData['language_id'];
        $book->status = $validatedData['status'];
        
        if($request['image_url'] != null){
            $validatedData = $request->validate([
                'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = time() . '.' . $request->image_url->extension();
            $request->image_url->storeAs('public/images', $fileName);
            $book->image_url = $fileName;

        }
        
        $book->save();
        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $results = DB::table('books')
            ->select('books.*','authors.name as authorName','languages.name as languageName','categories.name as categoriesName')
            ->join('authors','authors.id','=','books.author_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('categories','categories.id','=','books.category_id')
            ->where('books.id', $id)
        ->get()->first();
        return view('book.show', ['results' => $results]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    

     public function edit($id)
    {
        $authorsResults = Author::all();
        $categoryResults = Category::all();
        $languageResults = Language::all();
        $results = Book::find($id);
        return view('book.edit', ['results' => $results,'authorsResults' => $authorsResults, 'categoryResults' => $categoryResults,'languageResults' => $languageResults]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $validatedData = $request->validate([
            'language_id' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'author_id' => 'required|string|max:255',            
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        $book->name = $validatedData['name'];
        $book->price = $validatedData['price'];
        $book->author_id = $validatedData['author_id'];
        $book->category_id = $validatedData['category_id'];
        $book->language_id = $validatedData['language_id'];
        $book->status = $validatedData['status'];

        if($request['image_url'] != null){
            $validatedData = $request->validate([
                'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = time() . '.' . $request->image_url->extension();
            $request->image_url->storeAs('public/images', $fileName);
            $book->image_url = $fileName;
        }

        $book->save();
        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }

    public function book_stock_check($id)
    {
       
        $bookStockResult = DB::table('book_stocks')
            ->select('book_stocks.*','books.name as bookName','books.price as bookPrice','languages.name as langName','authors.name as authName')
            ->join('books','books.id','=','book_stocks.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_id', '=', $id)->get();

        $bookIssueResult = DB::table('book_issues')
            ->select('book_issues.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_issues.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_id', '=', $id)->get();

        $bookReturnResult = DB::table('book_returns')
            ->select('book_returns.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_id', '=', $id)->get();

        $bookSellResult = DB::table('book_sells')
            ->select('book_sells.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_sells.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_sells.volunteer_id')
            ->orderBy('created_at', 'DESC')
             ->where('book_id', '=', $id)->get();
        
        return view('book.book_stock_check', ['bookStockResult' => $bookStockResult,'bookReturnResult' => $bookReturnResult, 'bookIssueResult' => $bookIssueResult, 'bookSellResult' => $bookSellResult]);

    }

    public function volunteer_book_check($id)
    {
        if($id == 0){
            $id = Auth::user()->id;
        }
        
        $bookIssueResult = DB::table('book_issues')
            ->select('book_issues.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_issues.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_issues.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_issues.volunteer_id', '=', $id)->get();

        $bookReturnResult = DB::table('book_returns')
            ->select('book_returns.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_returns.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_returns.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_returns.volunteer_id', '=', $id)->get();

        $bookSellResult = DB::table('book_sells')
            ->select('book_sells.*','books.price as bookPrice','books.name as bookName','languages.name as langName','authors.name as authName','users.name as volunteerName')
            ->join('books','books.id','=','book_sells.book_id')
            ->join('languages','languages.id','=','books.language_id')
            ->join('authors','authors.id','=','books.author_id')
            ->join('users','users.id','=','book_sells.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('book_sells.volunteer_id', '=', $id)->get();

        $paymentResult = DB::table('volunteer_payments')
            ->select('volunteer_payments.*','users.name as volunteerName')
            ->join('users','users.id','=','volunteer_payments.volunteer_id')
            ->orderBy('created_at', 'DESC')
            ->where('volunteer_payments.volunteer_id', '=', $id)->get();

        $userResults = DB::table('users')
            ->select('users.*')
            ->where('users.id', '=', $id)->get();

        return view('volunteer.volunteer_book_check', ['bookReturnResult' => $bookReturnResult, 'bookIssueResult' => $bookIssueResult, 'paymentResult' => $paymentResult, 'bookSellResult' => $bookSellResult, 'userResults' => $userResults]);

    }
}