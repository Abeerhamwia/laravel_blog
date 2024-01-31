<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('homePage');
Route::get('tutorial/{category}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost'])->name('viewCategoryPost');
Route::get('tutorial/{category}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewPost'])->name('viewPost');


// Comment System
Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
Route::post('delete-comment', [App\Http\Controllers\Frontend\CommentController::class, 'destroy']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('viewCategory');
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('editCategory');
    Route::put('update-category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('updateCategory');
    //Route::get('delete-category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('deleteCategory');
    Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('deleteCategory');
    
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('posts');
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('addPost');
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('storePost');
    Route::get('edit-post/{post}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('editPost');
    Route::put('update-post/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('updatePost');
    Route::get('delete-post/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('deletePost');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('edit-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('editUser');
    Route::put('update-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('updateUser');
});

