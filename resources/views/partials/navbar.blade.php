<nav class="bg-white p-6 flex items-center justify-between">
    <ul class="flex items-center">
        <li class="px-5"><a href="/home" class="font-semibold">Home</a></li>
        <li class="px-5"><a href="{{ route('dashboard') }}" class="font-semibold">Dashboard</a></li>
        <li class="px-5"><a href="{{ route('posts') }}" class="font-semibold">Posts</a></li>
    </ul>
    <ul class="flex items-center">
        @auth
        <li x-data="{open: false}" @click="open = !open" class="px-5 relative"><a href="#" class="font-semibold">{{ Auth::user()->name }} <span class="text-xl p1"><i class="fas fa-angle-down"></i></span></a>
            <ul x-show="open" x-animation class="absolute bg-gray-100 py-3 px-8 rounded top-12 right-1">
                <li class="py-1"><a href="#" class="font-semibold hover:text-gray-600">Profile</a></li>
                <li class="py-1"><a href="{{ route('logout') }}" class="font-semibold hover:text-gray-600">Logout</a></li>   
            </ul>
        </li>
        @endauth
        @guest
        <li class="px-5"><a href="{{ route('register') }}" class="font-semibold">Register</a></li>
        <li class="px-5"><a href="{{ route('login') }}" class="font-semibold">Login</a></li>
        @endguest
    </ul>
</nav>