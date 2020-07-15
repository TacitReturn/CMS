@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? "Edit Post" : "Create Post" }}

        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route("posts.update", $post->id) : route("posts.store") }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title"
                           type="text" name="title"
                           value="{{ isset($post) ? $post->title : '' }}"
                    >
                </div>

                <div class="form-group">
                    @if(isset($post))
                        <img src="{{ asset("storage/" . $post->image) }}"
                             class="img-thumbnail my-5"
                             width="250px"
                        >
                    @else
                        <label for="image">Image</label>
                        <input name="image" type="file" class="form-control-file" id="image">
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="3"
                              rows="3">{{ isset($post) ? $post->description : '' }}</textarea>

                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    {{--                    <textarea class="form-control" name="content" id="content" cols="10" rows="10"></textarea>--}}
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input class="form-control" type="{{ isset($post) ? "text" : "datetime-local" }}"
                           id="published_at" name="published_at"
                           value="{{ isset($post) ? $post->published_at : '' }}"
                    >
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection
@section("css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection
