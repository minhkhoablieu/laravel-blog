@extends('layout.app')

@section('title') {{$page->name}} @endsection

@section('meta')
@php  $metaImage = asset("/storage/{$page->image}"); @endphp
    <x-meta
        :metaDescription="$page->description"
        metaPageType="article"
        :metaImage="$metaImage"></x-meta>
@endsection


@section('content')
    <h1 class="mb-5 font-bold text-3xl">{{$page->name}}</h1>
    <div class="mt-5 leading-loose flex flex-col ">
        <p class="mb-5"> {{$page->description}}</p>

        {!! $page->content !!}
    </div>

@endsection
