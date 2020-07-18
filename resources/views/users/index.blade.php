@extends('layouts.app')

@section('content')
    {{--    <div class="d-flex justify-content-end">--}}
    {{--        <a href="{{ route("posts.create") }}" class="btn btn-success mb-2">Add Posts</a>--}}
    {{--    </div>--}}

    <div class="card card-default">
        <div class="card-header">Users</div>
        <div class="card-body">
            @if(count($users) > 0)

                <table class="table">
                    <thead>
                    <th>Gravatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img class="rounded" src="{{ $user->gravatar }}" alt="user-{{ $user->id }}-avatar">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{ route("users.make-admin", $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Make Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>No users yet..</h3>
            @endif
        </div>
    </div>
@endsection
