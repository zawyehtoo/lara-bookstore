<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use  App\Http\Controllers\SearchController;
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
    return redirect()->route('booksaw');
});
//admin route
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']],function(){
    Route::get('/booklist',[BookController::class,'get_all'])->name('booklist');
    Route::get('/update',function(){
        return view('admin_dashboard.update');
    })->name('update');
    Route::resource('authors',AuthorController::class);

    Route::resource('genres',GenreController::class);

    Route::resource('publishers',PublisherController::class);
    Route::resource('books',BookController::class);
});

//user route
Route::group(['middleware'=>'auth'],function(){
    Route::get('/booksaw',[BookController::class,'books_for_ui'])->name('booksaw');
    Route::post('/search',[SearchController::class,'search_input'])->name('search');

    Route::get('/bookdetail/{id}',[BookController::class,'details']);
    Route::get('/authors/{id}',[AuthorController::class,'show']);
    Route::get('/genres/{id}',[GenreController::class,'show']);
    Route::get('/publishers/{id}',[PublisherController::class,'show']);
   
});



Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

