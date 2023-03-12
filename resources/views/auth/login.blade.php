@extends('layouts.app')

@section('main-section')

    <div class="w-full mt-5 flex justify-center">
        <div class="w-5/12 p-5 rounded-lg bg-white">
            <h2 class="text-3xl text-center mb-4 p-2">Login</h2>
            @if (session()->has('invalid'))
                <p class="bg-red-400 rounded text-white py-2 w-full my-4 text-center">
                    {{session('invalid')}}
                </p>
            @endif
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                 <div class="mb-3">
                    <label for="email" class="sr-only">Email :</label>
                    <input type="email" id="email" name="email" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('email') border-red-500 @enderror" value="" placeholder="Email Address">
                </div>
                @error('email')
                    <ul><li class="text-red-500">{{$message}}</li></ul>
                @enderror
                <div class="mb-3">
                    <label for="password" class="sr-only">Password :</label>
                    <input type="password" id="password" name="password" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('password') border-red-500 @enderror" value="" placeholder="Password">
                </div>
                @error('password')
                    <ul><li class="text-red-500">{{$message}}</li></ul>
                @enderror
                <button type="submit" class="bg-blue-500 rounded text-white py-2 w-full focus:bg-red-500 hover:bg-blue-400">Login</button>
            </form>
        </div>
    </div>
@endsection

