@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Show Category Section</h2>
</div>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Title</th>
				<th>Thumbnail</th>
				<th>Children</th>
				<th>Created at</th>
				<th>Updated at</th>
			</tr>
		</thead>
		<tbody>
			@if($category)
			<tr>
				<td>{{$category->title}}</td>
				<td>
					<img src="{{asset('storage/' . $category->thumbnail)}}" alt="Category Thumbnail" height="50px" />
				</td>
				<td>
					@if (!$category->children->isEmpty())
					@foreach ($category->children as $child)
					{{$child->title}}
					@endforeach
					@else
					<p>No Children category</p>
					@endif
				</td>
				<td>{{$category->created_at}}</td>
				<td>{{$category->updated_at}}</td>
			</tr>
			@else
			<tr class="text-center">
				<td colspan="5">No Category found.</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>

@endsection