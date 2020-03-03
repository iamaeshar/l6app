@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Edit User</h2>
</div>

<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$user->name}}">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
			value="{{$user->email}}">
	</div>
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone"
			value="{{$user->profile->phone}}">
	</div>
	<div class="form-group">
		<label for="country">Country</label>
		<select class="form-control" name="country" id="country">
			<option value="0">Select Country</option>
			@if(!$countries->isEmpty())
			@foreach($countries as $country)
			<option @if($country->id == $user->profile->country->id) {{'selected'}} @endif
				value="{{$country->id}}">{{$country->name}}
			</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<label for="city">City</label>
		<input type="text" class="form-control" id="city" name="city" placeholder="Enter city"
			value="{{$user->profile->city}}">
	</div>
	<div class="form-group">
		<label for="roles">Select Roles</label>
		<select name="roles[]" id="roles" class="form-control" multiple>
			@if (!$roles->isEmpty())
			@foreach ($roles as $role)
			<option @if(in_array($role->id, $user->roles->pluck('id')->toArray())) {{'selected'}} @endif
				value="{{$role->id}}">{{$role->name}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<img src="{{asset('storage/'. $user->profile->photo) }}" height="200" alt="Profile Photo" />
		<label for="photo">Profile photo</label>
		<input type="file" class="form-control form-file-control" id="photo" name="photo" />
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
	@endsection