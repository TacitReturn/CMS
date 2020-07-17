@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route("posts.create") }}" class="btn btn-success mb-2">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if(count($posts) > 0)

                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset("storage/" . $post->image) }}"
                                     class="img-thumbnail"
                                     width="120px"
                                >
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route("categories.edit", $post->category->id) }}">{{ $post->category->name }}</a>
                            </td>
                            @if($post->trashed())
                                <td>
                                    <form action="{{ route("posts.restore", $post->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route("posts.edit", $post->id) }}"
                                       class="btn btn-success btn-sm">Edit</a>
                                </td>
                            @endif
                            <td>
                                @if($post->trashed())
                                    <form action="{{ route("posts.destroy", $post->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @else
                                    <form action="{{ route("posts.destroy", $post->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm">Trash</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>No posts yet..</h3>
            @endif
        </div>
    </div>
@endsection
