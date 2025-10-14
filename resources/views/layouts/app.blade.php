<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="relative flex items-center justify-between h-14">

            <!--  Logo -->
            <a href="{{ route('books.index') }}" class="block">
                <img src="{{ asset('img/logo.png') }}" alt="Book Corner Logo"
                     class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-md">
            </a>

            <!-- Welcome Text -->
            @auth
            <div class="absolute left-1/2 transform -translate-x-1/2">
                <span class="text-sm sm:text-base font-medium">Welcome, {{ Auth::user()->name }}</span>
            </div>
            @endauth

            
            <div class="flex items-center space-x-3 sm:space-x-5">

                <!-- Hamburger menu (mobile only) -->
                <button id="menu-toggle" class="block md:hidden p-2 rounded hover:bg-blue-500 transition-colors focus:outline-none">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.books.index') }}" class="hover:text-blue-200 text-sm sm:text-base">Admin</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="flex items-center gap-2 text-sm sm:text-base hover:bg-red-500 rounded px-3 py-1 transition-colors">
                                Logout <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-200 text-sm sm:text-base">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-blue-200 text-sm sm:text-base">Register</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden flex-col md:hidden mt-1 rounded-lg overflow-hidden transition-all duration-300">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.books.index') }}"
                       class="block py-2 px-4 hover:bg-blue-500 transition-colors text-white font-medium border-b border-blue-500">
                        Admin
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full text-left py-2 px-4 hover:bg-blue-500 transition-colors text-white font-medium border-b border-blue-500 flex items-center gap-2">
                        Logout <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="block py-2 px-4 hover:bg-blue-500 transition-colors text-white font-medium border-b border-blue-500">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="block py-2 px-4 hover:bg-blue-500 transition-colors text-white font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-1 container mx-auto px-4 py-6 sm:py-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm sm:text-base">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-blue-600 text-white py-6 sm:py-8 mt-auto">
    <div class="container mx-auto px-4 text-center text-sm sm:text-base">
        <p>&copy; 2025 BookCorner. All rights reserved.</p>
    </div>
</footer>

<!-- Mobile Menu Toggle Script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
        } else {
            mobileMenu.style.maxHeight = "0px";
            setTimeout(() => mobileMenu.classList.add('hidden'), 300);
        }
    });
</script>

</body>
</html>
