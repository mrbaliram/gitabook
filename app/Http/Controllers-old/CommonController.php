<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Language;
use App\Models\Book_stocks;
use App\Models\Book_issue;
use App\Models\Book_return;
use App\Models\Book_sell;
use App\Models\Volunteer_payment;
use App\Models\User;
use App\Models\Event_info;
use App\Models\Contact_info;

use Illuminate\Support\Facades\DB;     

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $authorCount = Author::count();
        $categoryCount = Category::count();
        $languageCount = Language::count();
        $bookCount = Book::count();

        $bookStocksCount = Book_stocks::count();
        $bookIssueCount = Book_issue::count();
        $bookReturnCount = Book_return::count();
        $bookSellCount = Book_sell::count();
        
        $volunteerPaymentCount = Volunteer_payment::count();
        $UserCount = User::count();

        $eventInfoCount = Event_info::count();
        $contactInfoCount = Contact_info::count();

        //eventInfoCount contactInfoCount

        return view('dashboard', compact(
            'authorCount','categoryCount','languageCount','bookCount',
            'bookStocksCount','bookIssueCount','bookReturnCount','bookSellCount',
            'volunteerPaymentCount', 'UserCount','eventInfoCount','contactInfoCount'
        ));
        
    }
}
