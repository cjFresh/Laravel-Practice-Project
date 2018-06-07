@extends('layouts.app') 
<!-- layouts folder, app.blade.php file -->
<!-- use extends to use repeating templates in different pages -->
@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <!-- the title comes from the PagesController class, 
             index method where it is passed via the title 
             variable by using compact-->
        <p>This is the laravel application from the
           "Laravel" from scratch youtube series</p>
        <p>
            <a class="btn btn-outline-primary my-2 my-sm-0" href="/login" role="button">Login</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="/register" role="button">Register</a>
        </p>
    </div>
@endsection