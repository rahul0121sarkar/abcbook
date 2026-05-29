<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\admin;
use App\Http\Controllers\contactController;

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


Route::get('home',[Home::class,'home']);
Route::get('category',[Home::class,'category']);
Route::get('about',[Home::class,'about']);
Route::get('contact',[Home::class,'contact']);
// Route::get('librarie/{id}',[Home::class,'librarie'])->name('librarie');
Route::get('librarie',[Home::class,'librarie']);

// book image form route 
Route::get('book_image',[Home::class,'img']);
// Route::get('form',[Home::class,'form']);
// Route::post('insert',[Home::class,'insert']);

// book image insert route 

// Route::post('image_insert',[Home::class,'image_insert']);
Route::post('image_insert',[admin::class,'image_insert']);  

// book details 
Route::get('details/{id}',[Home::class,'book_detail'])->name('details');
// Route::get('details',[Home::class,'book_detail']);


// contact in home 
Route::post('contactInsert',[contactController::class,'contactInsert']);


// admin 
Route::get('admin',[admin::class,'admin'] );
Route::get('form',[admin::class,'form']);
Route::post('insert',[admin::class,'insert']);
Route::get('display',[admin::class,'display'] );
route::get('table-data/{id}',[admin::class,'delete'] );
route::get('table-edit/{id}',[admin::class,'table_edit']);
route::post('table-update/{id}',[admin::class,'table_update'])->name('table-update');

// poster 
route::get('poster-data/{id}',[admin::class,'poster_delete'] );
route::get('poster-edit/{id}',[admin::class,'poster_edit'] );
route::post('poster-update/{id}',[admin::class,'poster_update'] )->name('poster-update');


// contact side in admin 
Route::get('contact_display',[admin::class,'contact_display']);
Route::get('contact-data/{id}',[admin::class,'contact_delete']);

// pdf related file code 
Route::get('book',[admin::class,'bookpdf']);
Route::post('insertpdf',[admin::class,'insertpdf']);
Route::get('bookdisplay',[admin::class,'bookdisplay']);
Route::get('book-delete/{id}',[admin::class,'bookdelete']);
Route::get('bookpdf-details/{id}',[admin::class,'bookpdf_details']);
Route::post('book-update/{id}',[admin::class,'bookupdate'])->name('bookupdate');


//login
Route::get('login',[home::class,'login']);
Route::post('loginsert',[home::class,'loginsert']);
Route::get('logout',[admin::class,'logout']);

route::get('table',[home::class,'librarie']);