<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class DashboardController extends Controller
{
    //index
    public function index() {
        $posts = auth()->user()->posts;
        return view('dashboard',[
            'posts' => $posts
        ]);
    }
}
