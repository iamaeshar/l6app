@extends('dashboard.layouts.app');

@section('content')
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Show Role </h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Users</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->created_at}}</td>
                <td>{{$role->updated_at}}</td>
                <td>{{$role->users}}</td>
                <td>
                  <a href="{{route('roles.edit', $role->id)}}">Edit</a> |
                  <a href="{{route('roles.destroy', $role->id)}}">Delete</a>
                </td>
            </tr>
            @else
              <tr class="text-center">
                <td colspan="5">No roles found.</td>
              </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
