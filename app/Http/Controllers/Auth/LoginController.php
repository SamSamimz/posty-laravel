<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\RetryBatchCommand;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class LoginController extends Controller
{
    //index
    public function index() {
        return view('auth.login');
    }
    //store
    public function store(Request $request) {
      $user =  $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]
        );
        if(Auth::attempt($user)) {
            return redirect('/');
        }
        return redirect()->back()->with('invalid', 'Invalid login information');
    }
}
