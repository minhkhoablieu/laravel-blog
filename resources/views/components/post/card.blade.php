@props(['post'])

<div>
    <a href="{{route('posts.show', $post->id)}}" class="rounded block no-underline border shadow p-5 mb-10 border-white-100">
        <img class="h-48 w-full mb-5 object-cover object-center" src="{{asset($post->image)}}" alt="{{$post->name}}">
        <div class="flex flex-col justify-between flex-1">
            <div>
                <h2 class="leading-normal block mb-6 font-bold text-2xl">{{$post->name}}</h2>
                <p class="mb-6 leading-loose">
                    {{$post->description}}
                </p>
                <div class="flex items-center text-sm text-light">
                    <img class="w-10 h-10 rounded-full" src="{{$post->user->avatar}}" alt="{{$post->user->name}}">
                    <span class="ml-2">{{$post->user->name}}</span>
                    <span class="ml-auto">{{$post->created_at}}</span>
                </div>
            </div>
        </div>
    </a>

</div>
