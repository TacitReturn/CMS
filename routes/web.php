<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('welcome');
});

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
Route::resource("categories", "CategoriesController");
Route::resource("posts", "PostsController");
Route::get("trashed-posts", "PostsController@trashed")->name("trashed-post.index");

