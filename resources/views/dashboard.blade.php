@extends('layouts.app')

@section('main-section')
   <div class="flex justify-center mt-10">
    <div class="w-6/12 bg-white p-4 rounded-lg">
        <h2 class="text-center font-semibold text-2xl my-5">Dashboard</h2>
        <div class="mb-4">
            @if($posts->count()) 
            @foreach ($posts as $key => $post)
                <div class="mb-4">
                    <a href="{{route('posts.user',$post->user)}}" class="font-semibold">{{$post->user->name}}</a>  <span class="text-gray-400 text-sm">{{formatTime($post->created_at)}}</span>
                    <p class="mb-2">{{$post->body}}</p>
                    <div class="flex items-center gap-2">
                        @if (!$post->likedBy(auth()->user()))
                            
                        <form action="{{route('posts.like', $post)}}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-500">Like</button>
                        </form>
                        @else
                        <form action="{{route('posts.like', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Unlike</button>
                        </form>
                        @endif
                        @if ($post->likes->count() > 1)
                        <span>{{$post->likes->count()}} likes</span>
                        @else
                        <span>{{$post->likes->count()}} like</span>
                        @endif
                    </div>
                  @if($post->ownedBy(auth()->user()))
                        <form action="{{route('post.delete', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                  @endif
                </div>
            @endforeach
                @if($key < 1)
                <p>You have total {{++$key}} post</p>
                @else
                <p>You have total {{++$key}} posts</p>
                @endif
            @else
            <p>You have'nt any post yet!</p>
            @endif

        </div>
    </div>
    </div>
@endsection

