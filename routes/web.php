<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\SpaceController;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\AttachmentController;




Route::get('test', function () {
   return view('test');
});

Route::get('space', [SpaceController::class, 'index'])->name('space.index')->middleware('auth');
Route::get('/', [SpaceController::class, 'allSpaces'])->name('space.home')->middleware('auth');
Route::get('space/siteSpaces', [SpaceController::class, 'siteSpaces'])->name('space.siteSpaces')->middleware('auth');
Route::get('space/personalSpaces', [SpaceController::class, 'personalSpaces'])->name('space.personalSpaces')->middleware('auth');
Route::get('space/archivedSpaces', [SpaceController::class, 'archivedSpaces'])->name('space.archivedSpaces')->middleware('auth');

Auth::routes();

Route::resource('space', 'App\Http\Controllers\SpaceController', ['except'=>['index']])->middleware('auth');
Route::resource('page', 'App\Http\Controllers\PageController', ['except'=>['create']])->middleware('auth');
Route::get('page/create/{space_id}', [PageController::class, 'create'])->middleware('auth');
Route::resource('attachment', 'App\Http\Controllers\AttachmentController', ['except'=>['create']])->middleware('auth');
Route::get('attachment/create/{page_id}', [AttachmentController::class, 'create'])->middleware('auth');
Route::get('attachment/downloadFile/{filePath}', [AttachmentController::class, 'download'])->middleware('auth');
Route::get('attachmentList/{space_id}', [AttachmentController::class, 'spaceList'])->middleware('auth');


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
