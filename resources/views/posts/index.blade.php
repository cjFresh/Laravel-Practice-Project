@extends('layouts.app')

@section('content')
	<h1>Blog</h1>
	@if(!Auth::guest())
		<a href="/posts/create" class="btn btn-default">Write Post</a>
	@endif
	@if(count($posts) >= 1)
		@foreach($posts as $post)
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><a style="color:#000;text-decoration:none;"href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
			<h6 class="card-subtitle mb-2 text-muted">Date posted: {{$post->created_at}} by {{$post->user->name}}</h6>
			</div>
		</div>
		@endforeach
		{{$posts->links()}}
	@else
		<p>No posts found!</p>
	@endif
@endsection