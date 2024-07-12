<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyContoller;
use App\Http\Controllers\MypractiseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class,'homepage']);



Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/add_post',[PostController::class,'add_post']);



Route::post('/post_page',[PostController::class,'post_page']);



Route::get('/show_post',[PostController::class,'show_post']);



Route::get('/delete_post/{id}',[PostController::class,'delete_post']);



Route::get('/edit_post/{id}',[PostController::class,'edit_post']);



Route::get('/edit_my_post1/{id}',[AdminController::class,'edit_my_post1'])->middleware('auth');



Route::get('/post_detail/{id}',[MyContoller::class,'post_detail']);


Route::post('/upd_post/{id}',[MyContoller::class,'upd_post']);



Route::post('/edit_my_post/{id}',[AdminController::class,'edit_my_post']);


Route::get('/create_post',[MyContoller::class,'create_post'])->middleware('auth');


Route::post('/add_user',[MyContoller::class,'add_user']);


Route::get('/my_post',[MyContoller::class,'my_post'])->middleware('auth');



Route::get('/my_post_del/{id}',[MyContoller::class,'my_post_del'])->middleware('auth');

