@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Show User Section</h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Thumbnail</th>
                <th>City</th>
                <th>Country</th>
                <th>Roles</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if($user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>
                    <img src="{{ asset('storage/' . $user->profile->photo) }}" alt="Category Thumbnail"
                        height="50px" />
                </td>
                <td>{{$user->profile->city}}</td>
                <td>{{$user->profile->country->name}}</td>
                <td>{{$user->roles->implode('name', ',')}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
            @else
            <tr class="text-center">
                <td colspan="5">No User found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection