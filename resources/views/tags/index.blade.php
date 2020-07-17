@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route("tags.create") }}" class="btn btn-success mb-2 mt-2">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tag
        </div>
        <div class="card-body">
            @if(count($tags) > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th></th>
                    <th></th>
                    </thead>

                    <tbody>
                    @foreach($tags as $tag)

                        <tr>
                            <td>
                                {{ $tag->name }}
                            </td>
                            <td class="text-center">
{{--                                {{ $category->posts()->count() }}--}}
                                1
                            </td>
                            <td>
                                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal"
                                        onclick="handleDelete({{ $tag->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>No Tags..</h3>
            @endif
            <form action="" method="POST" id="deleteTagForm">
            @csrf
            @method('DELETE')
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this tag?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        function handleDelete(id) {
            let form = document.getElementById("deleteTagForm");
            form.action = 'http://localhost/LaravelCMS/public/tags/' + id;

            console.log('Delete ', form);
        }

    </script>
@endsection



