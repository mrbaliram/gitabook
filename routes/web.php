<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookStocksController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BookSellController;
use App\Http\Controllers\VolunteerPaymentController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\EventInfoController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    
    // dashboard
    Route::get('/dashboard', [CommonController::class, 'dashboard'])->name('dashboard.dashboard');


    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /// user/Volunteer list view suer_profile
    Route::get('/volunteer', [ProfileController::class, 'index'])->name('volunteer.index');
    Route::get('/volunteer/add', [ProfileController::class, 'add'])->name('volunteer.add');
    Route::post('/volunteer', [ProfileController::class, 'store'])->name('volunteer.store');
    Route::get('/volunteer/{volunteer}/edit', [ProfileController::class, 'edit_volunteer'])->name('volunteer.edit');
    Route::put('/volunteer/{volunteer}', [ProfileController::class, 'update_volunteer'])->name('volunteer.update');

    Route::put('/volunteer/{volunteer}', [ProfileController::class, 'update_volunteer'])->name('volunteer.update');
    Route::delete('/volunteer/{volunteer}', [ProfileController::class, 'delete_volunteer'])->name('volunteer.delete');
    
    // Reports  
    Route::get('/reports', [ReportController::class, 'getStockReport'])->name('reports.stock_report');
    //volunteer_report
    Route::get('/reports/volunteer_report', [ReportController::class, 'getVolunteerReport'])->name('reports.volunteer_report');
    //volunteer_sell_report
    Route::get('/reports/volunteer_sell_report', [ReportController::class, 'getVolunteerSellReport'])->name('reports.volunteer_sell_report');
    
    

    // events EventInfoController 
    Route::get('/events', [EventInfoController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventInfoController::class, 'create'])->name('events.create');
    Route::post('/events', [EventInfoController::class, 'store'])->name('events.store');
    Route::get('/events/{author}/edit', [EventInfoController::class, 'edit'])->name('events.edit');
    Route::put('/events/{author}', [EventInfoController::class, 'update'])->name('events.update');
    Route::delete('/events/{author}', [EventInfoController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{events}/show', [EventInfoController::class, 'show'])->name('events.show');

    // contact info ContactInfoController
    Route::get('/Contact_info', [ContactInfoController::class, 'index'])->name('Contact_info.index');
    Route::get('/Contact_info/create', [ContactInfoController::class, 'create'])->name('Contact_info.create');
    Route::post('/Contact_info', [ContactInfoController::class, 'store'])->name('Contact_info.store');
    Route::get('/Contact_info/{author}/edit', [ContactInfoController::class, 'edit'])->name('Contact_info.edit');
    Route::put('/Contact_info/{author}', [ContactInfoController::class, 'update'])->name('Contact_info.update');
    Route::delete('/Contact_info/{author}', [ContactInfoController::class, 'destroy'])->name('Contact_info.destroy');
    Route::get('/Contact_info/{Contact_info}/show', [ContactInfoController::class, 'show'])->name('Contact_info.show');

    // authors
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
  
    // category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //LanguageController language
    Route::get('/language', [LanguageController::class, 'index'])->name('language.index');
    Route::get('/language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('/language', [LanguageController::class, 'store'])->name('language.store');
    Route::get('/language/{language}/edit', [LanguageController::class, 'edit'])->name('language.edit');
    Route::put('/language/{language}', [LanguageController::class, 'update'])->name('language.update');
    Route::delete('/language/{language}', [LanguageController::class, 'destroy'])->name('language.destroy');


    //BookController book
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/book/{book}/show', [BookController::class, 'show'])->name('book.show');
    Route::get('/book/{book}/book_stock_check', [BookController::class, 'book_stock_check'])->name('book.book_stock_check');
    Route::get('/book/{book}/volunteer_book_check', [BookController::class, 'volunteer_book_check'])->name('book.volunteer_book_check');


    //book_stock BookStocksController
    Route::get('/Book_stocks', [BookStocksController::class, 'index'])->name('Book_stocks.index');
    Route::get('/Book_stocks/create', [BookStocksController::class, 'create'])->name('Book_stocks.create');
    Route::post('/Book_stocks', [BookStocksController::class, 'store'])->name('Book_stocks.store');
    Route::get('/Book_stocks/{Book_stocks}/edit', [BookStocksController::class, 'edit'])->name('Book_stocks.edit');
    Route::put('/Book_stocks/{Book_stocks}', [BookStocksController::class, 'update'])->name('Book_stocks.update');
    Route::delete('/Book_stocks/{Book_stocks}', [BookStocksController::class, 'destroy'])->name('Book_stocks.destroy');


    //Book_Issue  BookIssueController.php
    Route::get('/Book_Issue', [BookIssueController::class, 'index'])->name('Book_Issue.index');
    Route::get('/Book_Issue/create', [BookIssueController::class, 'create'])->name('Book_Issue.create');
    Route::post('/Book_Issue', [BookIssueController::class, 'store'])->name('Book_Issue.store');
    Route::get('/Book_Issue/{Book_Issue}/edit', [BookIssueController::class, 'edit'])->name('Book_Issue.edit');
    Route::put('/Book_Issue/{Book_Issue}', [BookIssueController::class, 'update'])->name('Book_Issue.update');
    Route::delete('/Book_Issue/{Book_Issue}', [BookIssueController::class, 'destroy'])->name('Book_Issue.destroy');

    //BookReturnController
    Route::get('/Book_Return', [BookReturnController::class, 'index'])->name('Book_Return.index');
    Route::get('/Book_Return/create', [BookReturnController::class, 'create'])->name('Book_Return.create');
    Route::post('/Book_Return', [BookReturnController::class, 'store'])->name('Book_Return.store');
    Route::get('/Book_Return/{Book_Return}/edit', [BookReturnController::class, 'edit'])->name('Book_Return.edit');
    Route::put('/Book_Return/{Book_Return}', [BookReturnController::class, 'update'])->name('Book_Return.update');
    Route::delete('/Book_Return/{Book_Return}', [BookReturnController::class, 'destroy'])->name('Book_Return.destroy');

    //Book Sell BookSellController Controllers\BookSellController.php
    Route::get('/Book_Sell', [BookSellController::class, 'index'])->name('Book_Sell.index');
    Route::get('/Book_Sell/create', [BookSellController::class, 'create'])->name('Book_Sell.create');
    Route::post('/Book_Sell', [BookSellController::class, 'store'])->name('Book_Sell.store');
    Route::get('/Book_Sell/{Book_Sell}/edit', [BookSellController::class, 'edit'])->name('Book_Sell.edit');
    Route::put('/Book_Sell/{Book_Sell}', [BookSellController::class, 'update'])->name('Book_Sell.update');
    Route::delete('/Book_Sell/{Book_Sell}', [BookSellController::class, 'destroy'])->name('Book_Sell.destroy');

    //Volunteer_payment VolunteerPaymentController
    Route::get('/Volunteer_payment', [VolunteerPaymentController::class, 'index'])->name('Volunteer_payment.index');
    Route::get('/Volunteer_payment/create', [VolunteerPaymentController::class, 'create'])->name('Volunteer_payment.create');
    Route::post('/Volunteer_payment', [VolunteerPaymentController::class, 'store'])->name('Volunteer_payment.store');
    Route::get('/Volunteer_payment/{Volunteer_payment}/edit', [VolunteerPaymentController::class, 'edit'])->name('Volunteer_payment.edit');
    Route::put('/Volunteer_payment/{Volunteer_payment}', [VolunteerPaymentController::class, 'update'])->name('Volunteer_payment.update');
    Route::delete('/Volunteer_payment/{Volunteer_payment}', [VolunteerPaymentController::class, 'destroy'])->name('Volunteer_payment.destroy');

    // ajax call     
     Route::get('/Book_Issue/{Book_Issue}/book_available', [BookIssueController::class, 'getCurrentBooksAvailable'])->name('Book_Issue.book_available');

     Route::get('/Book_Issue/{Book_Issue}/book_issue_to_volunteer', [BookIssueController::class, 'getBooksIssueToVolunteer'])->name('Book_Issue.book_issue_to_volunteer');

     Route::get('/Book_Issue/{Book_Issue}/book_return_by_volunteer', [BookIssueController::class, 'getBooksReturnByVolunteer'])->name('Book_Issue.book_return_by_volunteer');

     Route::get('/book/{language}/get_book_based_on_language', [BookStocksController::class, 'getBookBasedOnLanuage'])->name('book.get_book_based_on_language');

     // common

     Route::get('/Book_Return/{Book_Return}/get_book_base_on_volunteer', [BookReturnController::class, 'getBookBaseOnVolunteer'])->name('Book_Return.get_book_base_on_volunteer');

     Route::get('/Book_Return/{Book_Return}/volunteerId/{volunteerId}/get_issure_book_base_on_volunteer', [BookReturnController::class, 'getIssueBookBaseOnVolunteer'])->name('Book_Return.get_issure_book_base_on_volunteer');
     
     Route::get('/Book_Return/{Book_Return}/volunteerId/{volunteerId}/get_return_book_base_on_volunteer', [BookReturnController::class, 'getReturnBookBaseOnVolunteer'])->name('Book_Return.get_return_book_base_on_volunteer');

     Route::get('/Book_Return/{Book_Return}/volunteerId/{volunteerId}/get_sell_book_base_on_volunteer', [BookReturnController::class, 'getSellBookBaseOnVolunteer'])->name('Book_Return.get_sell_book_base_on_volunteer');

     // Invoice //C:\project\gitabook\app\Http\Controllers\InvoiceController.php
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{author}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::put('/invoice/{author}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('/invoice/{author}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');

});

require __DIR__.'/auth.php';