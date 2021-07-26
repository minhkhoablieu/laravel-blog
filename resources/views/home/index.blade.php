@extends('layout.app')

@section('title') {{config('app.name')}} @endsection

@section('content')
    @foreach($posts as $post)
        <x-post.card :post="$post" />
    @endforeach
    {{$posts->links()}}
@endsection
