@extends('layouts.app')

@section('content')
	<a href="/posts" class="btn btn-default">Go Back</a>
	<h1>{{$post->title}}</h1>
	<div>
		{!!$post->body!!}
		<!-- we use 1 { and 2 ! to parse html tags
			 used in the text editor -->
	</div>
	<hr>
	<h6>Written on {{$post->created_at}} by {{$post->user->name}}</h6>
	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id == $post->user_id)
			<a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a>
			{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-md-right'])!!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
			{!!Form::close()!!}
		@endif
	@endif
@endsection