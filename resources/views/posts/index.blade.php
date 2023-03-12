@extends('layouts.app')

@section('main-section')
   <div class="flex justify-center mt-10">
    <div class="w-6/12 bg-white p-4 rounded-lg">
        <div class="mb-4">
            <form action="{{ route('posts') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post Something..."></textarea>
                @error('body')
                <ul>
                    <li class="text-red-500">
                        {{$message}}
                    </li>
                </ul>
                @enderror
            </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 px-4 py-2 rounded text-white">Post</button>
                </div>
            </form>

            @if($posts->count()) 
            @foreach ($posts as $post)
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
            @else
            <p>hav'nt any data</p>
            @endif
        </div>
    </div>
    </div>
@endsection

