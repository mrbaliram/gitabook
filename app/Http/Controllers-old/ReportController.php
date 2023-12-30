<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book_issue;
use App\Models\Book_stocks;
use App\Models\Book_Return;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;    

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStockReport(Request $request)
    {
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $langIds = []; 

        $langid = 0;
        if($request['language_id'] != null && $request['language_id'] != '0'){
            $langid = $request['language_id'];
            array_push($langIds, $request['language_id']);
        }else{
            foreach($languageResults as $languageResult){
                array_push($langIds, $languageResult->id);
            }
        } 

        $bookResult = DB::table('books')
            ->select(
                'books.*','languages.name as langName',
                DB::raw('(SELECT sum(received_quantity) FROM book_stocks WHERE book_stocks.book_id = books.id) as totalStock'),
                DB::raw('(SELECT sum(issued_quantity) FROM book_issues WHERE book_issues.book_id = books.id) as totalIssue'),
                DB::raw('(SELECT sum(soled_quantity) FROM book_sells WHERE book_sells.book_id = books.id) as totalSold'),
                DB::raw('(SELECT sum(returned_quantity) FROM book_returns WHERE book_returns.book_id = books.id) as totalReturn')
                )
            ->join('languages','languages.id','=','books.language_id')
            ->whereIn('language_id', $langIds)
            ->get();
       
        return view('report.stock_report', ['languageResults' => $languageResults, 'bookResult' => $bookResult, 'langid' => $langid]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    // report volunteer wise--------------------
    
    public function getVolunteerReport(Request $request)
    {
        // users
        $userResult = DB::table('users')->orderBy('name', 'ASC')->get(); //User::all();
        $userIds =  [];
        $selected_volunteer_id = 0;
        if($request['volunteer_id'] != null && $request['volunteer_id'] != '0'){
            $selected_volunteer_id = $request['volunteer_id'];
            array_push($userIds, $request['volunteer_id']);
        }else{
            foreach($userResult as $userData){
                array_push($userIds, $userData->id);
            }
        } 
        
        // language
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $langIds = []; 
        
        $selected_langid = 0;
        if($request['language_id'] != null && $request['language_id'] != '0'){
            $selected_langid = $request['language_id'];
            array_push($langIds, $request['language_id']);
        }else{
            foreach($languageResults as $languageResult){
                array_push($langIds, $languageResult->id);
            }
        } 

        $bookResult = DB::table('books')
            ->select(
                'books.*','languages.name as langName',
                DB::raw('(SELECT sum(received_quantity) FROM book_stocks WHERE book_stocks.book_id = books.id) as totalStock'),
                DB::raw('(SELECT sum(issued_quantity) FROM book_issues WHERE book_issues.book_id = books.id and book_issues.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalIssue'),
                DB::raw('(SELECT sum(soled_quantity) FROM book_sells WHERE book_sells.book_id = books.id and book_sells.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalSold'),
                DB::raw('(SELECT sum(returned_quantity) FROM book_returns WHERE book_returns.book_id = books.id and book_returns.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalReturn')
                )
            ->join('languages','languages.id','=','books.language_id')
            ->whereIn('language_id', $langIds)
            ->get();
        //dd($bookResult);
        return view('report.stock_volunteer_report', ['languageResults' => $languageResults, 'bookResult' => $bookResult, 'selected_langid' => $selected_langid, 'selected_volunteer_id' => $selected_volunteer_id, 'userResult' => $userResult]);

    }

    // report volunteer sell wise--------------------

    public function getVolunteerSellReport(Request $request)
    {
        // users
        $userResult = DB::table('users')->orderBy('name', 'ASC')->get(); //User::all();
        $userIds =  [];
        $selected_volunteer_id = 0;
        if($request['volunteer_id'] != null && $request['volunteer_id'] != '0'){
            $selected_volunteer_id = $request['volunteer_id'];
            array_push($userIds, $request['volunteer_id']);
        }else{
            foreach($userResult as $userData){
                array_push($userIds, $userData->id);
            }
        } 
        
        // language
        $languageResults = DB::table('languages')->orderBy('name', 'ASC')->get();
        $langIds = []; 
        
        $selected_langid = 0;
        if($request['language_id'] != null && $request['language_id'] != '0'){
            $selected_langid = $request['language_id'];
            array_push($langIds, $request['language_id']);
        }else{
            foreach($languageResults as $languageResult){
                array_push($langIds, $languageResult->id);
            }
        } 

        $bookResult = DB::table('books')
            ->select(
                'books.*','languages.name as langName',
                DB::raw('(SELECT sum(received_quantity) FROM book_stocks WHERE book_stocks.book_id = books.id) as totalStock'),
                DB::raw('(SELECT sum(issued_quantity) FROM book_issues WHERE book_issues.book_id = books.id and book_issues.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalIssue'),
                DB::raw('(SELECT sum(soled_quantity) FROM book_sells WHERE book_sells.book_id = books.id and book_sells.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalSold'),
                DB::raw('(SELECT sum(returned_quantity) FROM book_returns WHERE book_returns.book_id = books.id and book_returns.volunteer_id in (' . implode(',', array_map('intval', $userIds)) . ')) as totalReturn')
                )
            ->join('languages','languages.id','=','books.language_id')
            ->whereIn('language_id', $langIds)
            ->get();
        //dd($bookResult); C:\Projects\bitBucket\gitabook\resources\views\report\stock_volunteer_sell_report.blade.php
        return view('report.stock_volunteer_sell_report', ['languageResults' => $languageResults, 'bookResult' => $bookResult, 'selected_langid' => $selected_langid, 'selected_volunteer_id' => $selected_volunteer_id, 'userResult' => $userResult]);

    }

}
