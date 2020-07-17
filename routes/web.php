<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('welcome');
});

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
Route::resource("categories", "CategoriesController");
Route::resource("posts", "PostsController")->middleware(["auth", "verifyCategoriesCount"]);
Route::get("trashed-posts", "PostsController@trashed")->name("trashed-post.index");
Route::put("restore-post/{post}", "PostsController@restore")->name("posts.restore");

