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
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ (isset($post) && $category->id == $post->category_id) ? 'selected' : NULL }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>
                </div>
                @if($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">Tags</label>

                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                        @if(isset($post))
                                        @if($post->hasTag($tag->id))
                                        selected
                                    @endif
                                    @endif
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif


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
                    <button type="submit" class="btn btn-success btn-block">
                        {{ isset($post) ? "Update Post" : "Submit" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section("css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

<script>

    $(document).ready(function () {
        $('#tags').select2();
    });
</script>
