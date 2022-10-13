<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

Route::get('findBook', 'App\Http\Controllers\BookController@findBook')->name('findBook');

Route::POST('updateBook', 'App\Http\Controllers\BookController@updateBook')->name('updateBook');

Route::get('/admin', function () {
    return view('admin');
});

// Route for Paging
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/addBook', function () {
    return view('addBook');
});


Route::get('/cart', function () {
    return view('cart');
});

Route::get('/order', function () {
    return view('order');
});

// Route for Login & Logout

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LogoutController::class, 'logout']);

// Route for User Database

Route::post('insertUser', 'App\Http\Controllers\UserController@insert')->name('insertUser');
Route::post('/', 'App\Http\Controllers\UserController@printUser');

Route::get('/', function () {
    $books = DB::table('users')->select('username', 'password', 'role', 'name', 'email', 'address')->get();
    return view('welcome', compact('users'));
});

// Route for Cart Database
Route::get('/', function () {
    $books = DB::table('carts')->select('username', 'ISBN_13', 'book_quantity', 'subtotal')->get();
    return view('welcome', compact('carts'));
});
// Route for Order Database

Route::post('insertCart', 'App\Http\Controllers\CartController@insertCart')->name('insertCart');
Route::post('updateCart', 'App\Http\Controllers\CartController@updateCart')->name('updateCart');
Route::get('deleteCart', 'App\Http\Controllers\CartController@deleteCart')->name('deleteCart');
Route::post('/', 'App\Http\Controllers\CartController@printCart');

Route::get('/cart', function () {
    $carts = DB::table('carts')->select('username', 'ISBN_13', 'book_quantity')->get();
    return view('cart', compact('carts'));
});

// Route for Order History Page

Route::get('/orderhistory', function () {
    $books = DB::table('books')->get();
    $orders = DB::table('orders')->where('username', Auth::user()->username)->get();
    $orderitems = DB::table('orderitem')->get();
    return view('orderhistory', compact('books', 'orders', 'orderitems'));
});

Route::get('/orderlist', function () {
    $books = DB::table('books')->get();
    $orders = DB::table('orders')->get();
    $orderitems = DB::table('orderitem')->get();
    return view('orderlist', compact('books', 'orders', 'orderitems'));
});

Route::post('/updateStatus', [OrderController::class, 'updateStatus'])->name('updateStatus');

// Route for Order Database

Route::post('insertOrder', 'App\Http\Controllers\OrderController@insert')->name('insertOrder');
Route::post('/', 'App\Http\Controllers\OrderController@printOrder');

Route::get('/order', function () {
    $carts = DB::table('carts')->where('username', Auth::user()->username)->get();
    $books = DB::table('books')->get();
    return view('order', compact('books', 'carts'));
});
Route::post('/createOrder', [OrderController::class, 'insertOrder'])->name('createOrder');
Route::post('/viewOrder', [OrderController::class, 'viewOrder'])->name('viewOrder');


// Route for AddBook

Route::post('insertBook', 'App\Http\Controllers\BookController@insert')->name('insertBook');
Route::post('/', 'App\Http\Controllers\BookController@printBook');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title', 'retail_price', 'book_cover_img', 'ISBN_13', 'book_stock')->get();
    return view('welcome', compact('books'));
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('deleteBook', 'App\Http\Controllers\BookController@deleteBook')->name('deleteBook');

//Route for Profile page
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/editAddress', function () {
    return view('editAddress');
})->name('editAddress');

Route::post('/updateAddress', [UserController::class, 'updateAddress'])->name('updateAddress');

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    // ...
});
