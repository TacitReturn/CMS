<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        return view("users.index")->with("users", User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = "admin";
        $user->save();

        session()->flash("success", "Admin created successfully..");
        return redirect(route("users.index"));
    }

    public function edit()
    {

        return view("users.edit")->with("user", auth()->user());
    }

    public function update()
    {
        $user = auth()->user();
    }
}
