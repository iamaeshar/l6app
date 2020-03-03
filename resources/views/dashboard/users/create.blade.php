@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Create New User</h2>
</div>

<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
	</div>
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone">
	</div>
	<div class="form-group">
		<label for="country">Country</label>
		<select class="form-control" name="country" id="country">
			<option value="0">Select Country</option>
			@if(!$countries->isEmpty())
			@foreach($countries as $country)
			<option value="{{$country->id}}">{{$country->name}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<label for="city">City</label>
		<input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
	</div>
	<div class="form-group">
		<label for="roles">Select Roles</label>
		<select name="roles[]" id="roles" class="form-control" multiple>
			@if (!$roles->isEmpty())
			@foreach ($roles as $role)
			<option value="{{$role->id}}">{{$role->name}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<label for="photo">Profile photo</label>
		<input type="file" class="form-control form-file-control" id="photo" name="photo" />
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
	@endsection