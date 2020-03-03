@extends('dashboard.layouts.app');

@section('content')
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Roles Section</h2>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a href="{{ route('roles.create') }}" class="btn btn-sm btn-outline-secondary">Add New</a>
    </div>
  </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Users</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$roles->isEmpty())
              @foreach($roles as $key => $role)
              <tr>
                  <td>{{++$key}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->created_at}}</td>
                  <td>{{$role->updated_at}}</td>
                  <td>{{$role->users->implode('name', ', ')}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{route('roles.show', $role->id)}}" class="btn btn-link">Show</a>
                      <a href="{{route('roles.edit', $role->id)}}" class="btn btn-link">Edit</a>
                      <form action="{{route('roles.destroy', $role->id)}}" method="post">
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
                <td colspan="5">No roles found.</td>
              </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
