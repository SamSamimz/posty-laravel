<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //index
    public function index() {
        $post = Post::latest('created_at')->get();
        return view('posts.index',[
            'posts' => $post,
        ]);
    }
    //store
    public function store(Request $request) {
        $request->validate([
            'body' => 'required',
        ]);
        $request->user()->posts()->create([
            'body' => $request->body,
        ]);
        return redirect()->back();
    }

    //delete
    public function delete(Post $post) {
        if($post->ownedBy(auth()->user())) {
            $post->delete();
        }else {
            abort(404);
        }
        return back();
    }
}
