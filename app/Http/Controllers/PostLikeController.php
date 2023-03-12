<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostLikeController extends Controller
{
    //store
    public function store(Post $post, Request $request) {

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return redirect()->back();
    }
    //delete
    public function delete(Post $post, Request $request) {

        $request->user()->likes()->where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}
