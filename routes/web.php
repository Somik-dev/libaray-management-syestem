<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

//student profile
Route::get('/student/update',[HomeController::class,'student_update'])->name('student.update');
Route::post('/student/info/update', [HomeController::class,'student_info_update'])->name('student.info.update');
Route::post('/student/password/update',[HomeController::class,'student_password_update'])->name('student.pass.update');
Route::post('/student/photo/update',[HomeController::class,'student_photo_update'])->name('student.photo.update');

//Student Book
Route::get('/student/book',[HomeController::class,'student_book'])->name('student.book');
Route::get('/borrow/book/{id}',[HomeController::class,'borrow_book'])->name('borrow.book');


//Book Details
Route::get('/book/details/{book_id}',[HomeController::class,'book_details'])->name('book.details');

//book history
Route::get('/book/history',[HomeController::class,'book_history'])->name('book.history');
Route::get('/cancel/book/{id}',[HomeController::class,'cancel_book'])->name('cancel.book');

//Explore book
Route::get('/explore',[HomeController::class,'explore'])->name('explore');
Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/category/search/{id}',[HomeController::class,'category_search'])->name('category.search');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/home',[AdminController::class,'index']);




//user list
Route::get('/users', [AdminController::class, 'users'])->name('user');
Route::get('/users/delete/{id}', [AdminController::class, 'users_delete'])->name('delete');
Route::get('/trash', [AdminController::class, 'trash'])->name('trash');
Route::get('/restore/{user_id}', [AdminController::class, 'restore'])->name('user.restore');
Route::get('/user/delete/hard/{user_id}', [AdminController::class, 'hard_delete'])->name('user.delete.hard');



Route::get('/category_page',[AdminController::class,'category_page'])->name('category.page')->middleware(['auth','admin']);
Route::post('/category/store',[AdminController::class,'category_post'])->name('category.store')->middleware(['auth','admin']);
Route::get('/category/edit/{category_id}',[AdminController::class,'category_edit'])->name('category.edit')->middleware(['auth','admin']);
Route::post('/category/update',[AdminController::class,'category_update'])->name('category.update')->middleware(['auth','admin']);
Route::get('/category/soft/delete/{category_id}',[AdminController::class,'category_soft_delete'])->name('category.soft.delete');
Route::get('/category/trash',[AdminController::class,'category_trash'])->name('category.trash')->middleware(['auth','admin']);
Route::get('/category/restore/{id}',[AdminController::class,'category_restore'])->name('category.restore')->middleware(['auth','admin']);
Route::get('/category/hard/delete/{id}',[AdminController::class,'category_hard_delete'])->name('category.hard.delete')->middleware(['auth','admin']);


//Admin profile update
Route::get('/profile/update',[AdminController::class,'profile_update'])->name('profile.update')->middleware(['auth','admin']);
Route::post('/user/info/update', [AdminController::class,'user_info_update'])->name('user.info.update')->middleware(['auth','admin']);
Route::post('/password/update',[AdminController::class,'password_update'])->name('user.pass.update')->middleware(['auth','admin']);
Route::post('/user/photo/update',[AdminController::class,'user_photo_update'])->name('user.photo.update')->middleware(['auth','admin']);


//book
Route::get('/Add/book',[AdminController::class,'Add_book'])->name('add.book')->middleware(['auth','admin']);
Route::post('/store/book',[AdminController::class,'store_book'])->name('store.book')->middleware(['auth','admin']);
Route::get('/store/book',[AdminController::class,'book_list'])->name('book.list')->middleware(['auth','admin']);
Route::get('/book/edit/{book_id}',[AdminController::class,'book_edit'])->name('book.edit')->middleware(['auth','admin']);
Route::post('/book/update', [AdminController::class, 'book_update'])->name('book.update')->middleware(['auth','admin']);
Route::get('/book/soft/delete/{book_id}',[AdminController::class,'book_soft_delete'])->name('book.soft.delete');
Route::get('/book/trash',[AdminController::class,'book_trash'])->name('book.trash')->middleware(['auth','admin']);
Route::get('/book/restore/{id}',[AdminController::class,'book_restore'])->name('book.restore');
Route::get('/book/hard/delete/{id}',[AdminController::class,'book_hard_delete'])->name('book.hard.delete');

//borrow
Route::get('/borrow/request',[AdminController::class,'borrow_request'])->name('borrow.request')->middleware(['auth','admin']);
Route::get('/approve/book/{id}',[AdminController::class,'approve_book'])->name('approve.book')->middleware(['auth','admin']);
Route::get('/return/book/{id}',[AdminController::class,'return_book'])->name('return.book')->middleware(['auth','admin']);
Route::get('/reject/book/{id}',[AdminController::class,'reject_book'])->name('reject.book')->middleware(['auth','admin']);
