<?php

use Illuminate\Support\Facades\Route;

Route::get("/", "WelcomeController@index")->name('welcome');
Route::get("/posts{post}", [PostsController::class, "show"]);
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get("/home", "HomeController@index")->name("home");
    Route::resource("categories", "CategoriesController");
    Route::resource("posts", "PostsController");
    Route::resource("tags", "TagsController");
    Route::get("trashed-posts", "PostsController@trashed")->name("trashed-post.index");
    Route::put("restore-post/{post}", "PostsController@restore")->name("posts.restore");
});


Route::middleware(["auth", "verifyIsAdmin"])->group(function () {
    Route::get("users/profile", "UsersController@edit")->name("users.edit-profile");
    Route::put("users/profile", "UsersController@update")->name("users.update-profile");
    Route::get("users", "UsersController@index")->name("users.index");
    Route::post("users/{user}/make-admin", "UsersController@makeAdmin")->name("users.make-admin");
});


