@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-outline-primary float-md-right">Create a post!</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped table-light">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $p)
                            <tr>
                                <td>{{$p->title}}</td>
                                <td><a href="/posts/{{$p->id}}/edit" class="btn btn-outline-info">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['PostsController@destroy', $p->id], 'method' => 'POST', 'class' => 'float-md-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts.</p>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
