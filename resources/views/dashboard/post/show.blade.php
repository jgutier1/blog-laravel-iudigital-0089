@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <img class="post-image" src="http://localhost:8000/images/otro/{{$post->image}}" alt="{{$post->image}}">
    <p>{{$post->content}}</p>
@endsection
