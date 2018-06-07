@extends('layouts.app') 
<!-- layouts folder, app.blade.php file -->
<!-- use extends to use repeating templates in different pages -->
@section('content')
     <h1>{{$title}}</h1>
     <p>This is the about page</p>
@endsection