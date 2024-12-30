<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ThemeController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;




Route::controller(ThemeController::class)->name("theme.")->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/category/{id}','category')->name('category');
    Route::get('/contact','contact')->name('contact');
    Route::get('/single blog','singleblog')->name('single blog');


});
Route::get('/blog/myblogs',[BlogController::class , 'myblogs'])->name('blogs.my-blogs');

Route::post('/subscriber/store', [SubscribeController::class , 'store'])->name('subscriber.store');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
Route::resource('blogs',BlogController::class)->except('index');

//route for Comments
Route::post('/comments/store',[CommentController::class,'store'])->name('comments.store');




require __DIR__.'/auth.php';
