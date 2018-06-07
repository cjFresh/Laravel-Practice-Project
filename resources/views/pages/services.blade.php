@extends('layouts.app') 
<!-- layouts folder, app.blade.php file -->
<!-- use extends to use repeating templates in different pages -->
@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul class="list-group">
            @foreach($services as $s)
                <li class="list-group-item">{{$s}}</li>
            @endforeach
        </ul>
    @endif  
@endsection