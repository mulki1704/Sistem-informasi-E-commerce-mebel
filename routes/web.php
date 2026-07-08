<?php

use App\Http\Controllers\artikelcontroller;
use App\Http\Controllers\beritacontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kontak2Controller;
use App\Http\Controllers\kontakcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\visimisicontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/main', function () {
    return view('layouts.main');
});

route::get('/', [HomeController::class, 'home']);
route::get('/artikel', [HomeController::class, 'berita'])->name('frontend.berita');
route::get('/tentangkami', [HomeController::class, 'tentangkami']);
route::get('/product', [Productcontroller::class, 'product']);
route::resource('/kontak', kontakcontroller::class);
route::get('/Showberita/{berita:slug?}', [HomeController::class, 'showberita'])->name('frontend.showberita');
route::post('/berita/{berita}/comments', [CommentController::class, 'store'])->middleware('auth');
route::put('/comments/{comment}', [CommentController::class, 'update'])->middleware('auth');
route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');
route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->middleware('auth')->name('comments.reply');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/comments', [CommentController::class, 'adminIndex'])->name('admin.comments.index');
    Route::get('/admin/comments/{comment}/delete', [CommentController::class, 'adminDelete'])->name('admin.comments.delete');
    Route::get('/admin/comments/{comment}/edit', [CommentController::class, 'adminEdit'])->name('admin.comments.edit');
    Route::get('/admin/comments/{comment}', [CommentController::class, 'adminShow'])->name('admin.comments.show');
});
route::get('/Showartikel/{artikel:slug?}', [HomeController::class, 'showartikel']);
route::get('/Showproduct/{product:slug?}', [HomeController::class, 'showproduct'])->name('showproduct');
Route::middleware('auth')->group(function () {
    Route::get('/products/{product}/order', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/products/{product}/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/admin/orders/create', [OrderController::class, 'adminCreate'])->name('admin.orders.create');
    Route::post('/admin/orders', [OrderController::class, 'adminStore'])->name('admin.orders.store');
    Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
    Route::get('/admin/orders/{order}/edit', [OrderController::class, 'adminEdit'])->name('admin.orders.edit');
    Route::put('/admin/orders/{order}', [OrderController::class, 'adminUpdate'])->name('admin.orders.update');
    Route::delete('/admin/orders/{order}', [OrderController::class, 'adminDestroy'])->name('admin.orders.destroy');
    Route::post('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::post('/admin/orders/{order}/cancel-approve', [OrderController::class, 'approveCancellation'])->name('admin.orders.cancel.approve');
    Route::post('/admin/orders/{order}/cancel-reject', [OrderController::class, 'rejectCancellation'])->name('admin.orders.cancel.reject');
});

route::get('/login', [logincontroller::class, 'index'])->middleware('guest')->name('login');
route::post('/login', [logincontroller::class, 'authenticate']);
route::get('/admin/login', [logincontroller::class, 'adminIndex'])->middleware('guest')->name('admin.login');
route::post('/admin/login', [logincontroller::class, 'adminAuthenticate'])->name('admin.login.submit');
route::get('/register', [registercontroller::class, 'index'])->middleware('guest')->name('register');
route::post('/register', [registercontroller::class, 'store']);
route::post('/logout', [logincontroller::class, 'logout'])->name('logout');

route::get('/dashboard', [dashboard::class, 'index'])->middleware('auth');
Route::resource('/dashboard/artikel', artikelcontroller::class)->middleware('auth');
Route::resource('/dashboard/visimisi', visimisicontroller::class)->middleware('auth');
Route::resource('/dashboard/berita', beritacontroller::class)->middleware('auth');
Route::resource('/dashboard/kontaks', Kontak2Controller::class)->middleware('auth');
Route::resource('/dashboard/product', Productcontroller::class)->middleware('auth');

route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    ;
});
