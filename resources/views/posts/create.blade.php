@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create Post
        </div>
        <div class="card-body">
            <form action="{{ route("posts.store") }}" METHOD="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input name="image" type="file" class="form-control-file" id="image">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="3" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="10" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>

                    <input class="form-control" type="date" id="published_at" name="published_at">
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
