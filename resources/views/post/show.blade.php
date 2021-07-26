@extends('layout.app')

@section('content')
    <h1 class="mb-5 font-bold text-3xl">{{$post->name}}</h1>
    <div class="mt-5 leading-loose flex flex-col justify-center items-center">
        {!! $post->content !!}
    </div>
    <div class="mt-10 flex flex-col md:flex-row items-center p-5 border border-lighter rounded">
        <div class="w-full md:w-1/6 text-center flex justify-center	">
            <img class="object-cover object-center rounded-full w-32 md:w-48" src="{{ asset("/storage/{$post->user->avatar}") }}" alt="{{$post->user->name}}">
        </div>
        <div class="md:pl-5 leading-loose text-center md:text-left text-text-color w-full lg:w-5/6">
            Tác giả: <span class="font-bold">{{$post->user->name}}</span>
        </div>
    </div>
@endsection
