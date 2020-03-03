@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Users Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-secondary">Add New</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Thumbnail</th>
                <th>City</th>
                <th>Country</th>
                <th>Roles</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$users->isEmpty())
            @foreach($users as $key => $user)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                @if($user->profile != null)
                <td>
                    <img src="{{ asset('storage/' . $user->profile->photo) }}" alt="Category Thumbnail" height="50px" />
                </td>
                <td>{{$user->profile->city}}</td>
                <td>{{$user->profile->country->name ?? 'N/A'}}</td>
                @else
                <td>
                    no photo
                </td>
                <td>no address</td>
                <td>no country</td>
                @endif

                <td>{{$user->roles->implode('name', ',')}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-link">Show</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-link">Edit</a>
                        <form action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link">Delete</a>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="10">No Users found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection