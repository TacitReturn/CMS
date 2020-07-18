<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get("/home", "HomeController@index")->name("home");
    Route::resource("categories", "CategoriesController");
    Route::resource("posts", "PostsController");
    Route::resource("tags", "TagsController");
    Route::get("trashed-posts", "PostsController@trashed")->name("trashed-post.index");
    Route::put("restore-post/{post}", "PostsController@restore")->name("posts.restore");
});


Route::get("users", "UsersController@index")->name("users.index");
