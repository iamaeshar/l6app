@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Create New Roles</h2>
</div>

<form action="{{ route('roles.store') }}" method="post">
	@csrf
	<div class="form-group">
		<label for="role">Name</label>
		<input type="text" class="form-control" id="role" name="name" placeholder="Role name">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
	@endsection