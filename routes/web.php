<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\SpaceController;



// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [SpaceController::class, 'index'])->middleware('auth');

Auth::routes();

// Route::get('space', function () {
//    return view('space/index');
// });
Route::resource('space', 'App\Http\Controllers\SpaceController')->middleware('auth');


Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/home', function(){
    dd('admin here');
 })->middleware('is_admin');

 Route::get('editor/home', function(){
    dd('editor here');
 })->middleware('is_aditor');

 Route::get('viewer/home', function(){
    dd('viewer here');
 })->middleware('is_viewer');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
