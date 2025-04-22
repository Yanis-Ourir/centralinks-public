<nav class="relative z-20">
         
    <div class="md:hidden fixed top-4 right-4 z-30">
        <button id="navToggle" class="p-2 bg-[#161616] border border-gray-700 rounded-lg text-white shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="menuIcon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="closeIcon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

 
    <div class="hidden md:flex justify-between items-center px-6 py-2 mx-auto mt-4 max-w-5xl bg-[#161616] border border-gray-700 shadow-md shadow-black/30 backdrop-blur-md rounded-full text-white">
        <div class="text-lg font-bold tracking-wide">
            <a href="{{ route('home') }}">Centralinks</a>
        </div>

        <ul class="flex space-x-6 text-sm font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition">Home</a></li>
            <li><a href="#" class="hover:text-yellow-400 transition">About</a></li>
            <li><a href="#" class="hover:text-yellow-400 transition">Contact</a></li>
        </ul>

        <div class="flex space-x-4 text-sm font-medium items-center">
            @auth
                <a href="{{ route('logout') }}" class="hover:text-yellow-400 transition">Logout</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-yellow-400 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-yellow-400 text-black px-4 py-1 rounded-full hover:bg-yellow-500 transition">
                    Sign up
                </a>
            @endauth
        </div>
    </div>

 
    <div id="mobileMenu" class="fixed inset-0 bg-[#161616] flex flex-col justify-center items-center z-20 transform transition-transform duration-300 ease-in-out translate-y-full md:hidden">
        <ul class="flex flex-col space-y-6 text-center mb-10">
            <li><a href="{{ route('home') }}" class="text-xl font-medium text-white hover:text-yellow-400 transition">Home</a></li>
            <li><a href="#" class="text-xl font-medium text-white hover:text-yellow-400 transition">About</a></li>
            <li><a href="#" class="text-xl font-medium text-white hover:text-yellow-400 transition">Contact</a></li>
        </ul>

        <div class="flex flex-col space-y-4 items-center">
            @auth
                <a href="{{ route('logout') }}" class="text-lg font-medium text-white hover:text-yellow-400 transition">Logout</a>
            @else
                <a href="{{ route('login') }}" class="text-lg font-medium text-white hover:text-yellow-400 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-yellow-400 text-black px-6 py-2 rounded-full hover:bg-yellow-500 transition text-lg font-medium">
                    Sign up
                </a>
            @endauth
        </div>
    </div>
</nav>