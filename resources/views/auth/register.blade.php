@extends('layouts.app')

@section('main-section')

    <div class="w-full mt-5 flex justify-center">
        <div class="w-5/12 p-5 rounded-lg bg-white">
            <h2 class="text-3xl text-center mb-4 p-2">Register</h2>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="sr-only">Name :</label>
                    <input type="text" id="name" name="name" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}" placeholder="Username">
                </div>
                @error('name')
                    <ul><li class="text-red-500">{{$message}}</li></ul>
                @enderror
                <div class="mb-3">
                    <label for="email" class="sr-only">Email :</label>
                    <input type="email" id="email" name="email" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}" placeholder="Email Address">
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
                <div class="mb-3">
                    <label for="password" class="sr-only">Re-type Password :</label>
                    <input type="password" id="password" name="password_confirmation" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('password') border-red-500 @enderror" value="" placeholder="Confirm Password">
                </div>
                <button type="submit" class="bg-blue-500 rounded text-white py-2 w-full focus:bg-red-500 hover:bg-blue-400">Register</button>
            </form>
        </div>
    </div>
@endsection

