@extends('layout.app')

@section('title') {{config('app.name')}} @endsection

@section('meta')

    @php
        $metaDescription = Setting::get('meta_description')

    @endphp
    <x-meta
        :metaDescription="$metaDescription"
        metaPageType="website"
        metaImage="/public/images/meta_image.jpg"></x-meta>
@endsection

@section('content')

    @foreach($posts as $post)
        <x-post.card :post="$post"></x-post.card>
    @endforeach
    {{$posts->links()}}
@endsection
