@extends('layout.app')

@section('title') {{config('app.name')}} @endsection

@section('meta')

    @php
    $metaDescription = \App\Models\Setting::get('meta_description')

    @endphp
    <x-meta
        :metaDescription="$metaDescription"
        metaPageType="website"
        metaImage="/public/images/meta_image.jpg"
    />
@endsection

@section('content')
    @foreach($posts as $post)
        <x-post.card :post="$post" />
    @endforeach
    {{$posts->links()}}
@endsection
