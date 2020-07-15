<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index")->with("posts", Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // Upload Image
//        $image = $request->image->store("posts");
        // Create Post
        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
//            "image" => $image
            "image" => $request->file("image")->store("posts", "public"),
            "published_at" => $request->published_at
        ]);
        // Flash message

        session()->flash("success", "Post created successfully..");
        // Redirect User
        return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.create")->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where("id", $id)->firstOrFail();
        if ($post->trashed()) {
            Storage::delete($post->image);
            $post->forceDelete();
            session()->flash("success", "Post deleted..");
        } else {
            $post->delete();
            session()->flash("success", "Post moved to trash..");
        }


        return redirect(route("posts.index"));
    }


    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view("posts.index")->with("posts", $trashed);

    }
}
