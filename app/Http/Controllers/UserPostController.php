<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use GuzzleHttp\PrepareBodyMiddleware;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //index
    public function index(User $user) {
        $post = Post::where('user_id', $user->id)->get();
        // return $post;
        return view('userpost',[
            'posts' => $post,
            'user' => $user,
        ]);
    }
}
