@extends('layouts.app')

@section('content')
	<h1>Blog</h1>
	<a href="/download_posts" role="button" class="btn btn-outline-primary">Download All Posts</a>
	<br>
	<br>
	@if(!Auth::guest())
		<a href="/posts/create" class="btn btn-default">Write Post</a>
	@endif
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Title</th>
						<th scope="col">Date</th>
						<th scope="col">Author</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
							<tr>
								<th scope="row"><a style="color:#000;text-decoration:none;"href="/posts/{{$post->id}}">{{$post->title}}</a></th>
								<td>{{$post->created_at}}</td>
								<td>{{$post->user->name}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
@endsection