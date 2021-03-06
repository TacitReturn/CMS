@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route("categories.create") }}" class="btn btn-success mb-2 mt-2">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            @if(count($categories) > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th></th>
                    <th></th>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)

                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td class="text-center">
                                {{ $category->posts()->count() }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal"
                                        onclick="handleDelete({{ $category->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>No Categories..</h3>
            @endif
            <form action="" method="POST" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this category?
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
            let form = document.getElementById("deleteCategoryForm");
            form.action = 'http://localhost/LaravelCMS/public/categories/' + id;

            console.log('Delete ', form);
        }

    </script>
@endsection



