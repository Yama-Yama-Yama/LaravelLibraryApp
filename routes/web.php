<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function() 
{
    Route::get('/admin', function () 
    {
      return view('admin.dashboard');
    })->name('dashboard');
});
Route::middleware(['auth', 'isAdmin'])->group(function() 
{
//Author routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::post('/authors/delete/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::post('/authors/create', [AuthorController::class, 'store'])->name('authors.store');

//Book routes
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::post('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
Route::post('/book/create', [BookController::class, 'store'])->name('book.store');

//Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

//Publisher routes
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
Route::post('/publisher/delete/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
Route::post('/publisher/create', [PublisherController::class, 'store'])->name('publisher.store');

//Customers routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::post('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');



Route::get('/book_issue', [BookIssueController::class, 'index'])->name('book_issued');
Route::get('/book-issue/create', [BookIssueController::class, 'create'])->name('book_issue.create');
Route::get('/book-issue/edit/{id}', [BookIssueController::class, 'edit'])->name('book_issue.edit');
Route::post('/book-issue/update/{id}', [BookIssueController::class, 'update'])->name('book_issue.update');
Route::post('/book-issue/delete/{id}', [BookIssueController::class, 'destroy'])->name('book_issue.destroy');
Route::post('/book-issue/create', [BookIssueController::class, 'store'])->name('book_issue.store');
});
