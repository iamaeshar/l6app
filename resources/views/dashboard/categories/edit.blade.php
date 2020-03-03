@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Edit Category</h2>
</div>

<form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="category">Name</label>
		<input type="text" class="form-control" id="category" name="title" placeholder="Category name"
			value="{{$category->title}}">
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea rows="5" cols="20" class="form-control" id="content" name="content"
			placeholder="Category Content">{!! $category->content !!}</textarea>
	</div>
	<div class="form-group">
		<img src="{{asset('storage/'. $category->thumbnail) }}" alt="Category Thumbnail" height="50" />
		<label for="thumbnail">Thumbnail</label>
		<input type="file" class="form-control form-file-control" id="thumbnail" name="thumbnail" />
	</div>
	<div class="form-group">
		<label for="parent_category">Parent Category</label>
		<select class="form-control" name="parent_id" id="parent_category">
			<option value="0">Select parent category</option>
			@if(!$categories->isEmpty())
			@foreach($categories as $cats)
			<option @if($category->parent_id == $cats->id) {{'selected'}} @endif value="{{$cats->id}}">{{$cats->title}}
			</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
	@endsection