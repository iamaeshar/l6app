@extends('dashboard.layouts.app')

@section('content')
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Edit Role</h2>
</div>

<form action="{{ route('roles.update', $role->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="role">Name</label>
    <input type="text" class="form-control" id="role" name="name" placeholder="Role name" value="{{$role->name}}">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
@endsection
