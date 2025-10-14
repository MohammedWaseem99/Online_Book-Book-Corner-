<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  crossorigin="anonymous"
/>

</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-14">

            
            <div class="flex items-center space-x-3">
                <!--  Logo -->
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-md">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                </div>

                <!-- Admin Title -->
                <a href="{{ route('admin.books.index') }}" class="text-xl sm:text-2xl font-bold">Admin</a>
            </div>

            <!-- Links -->
            <div class="flex items-center space-x-4 text-sm sm:text-base">
                <span class="hidden sm:inline">Welcome, {{ Auth::user()->name }}</span>
                <a href="{{ route('books.index') }}" class="px-3 py-1 hover:text-gray-300 transition-colors flex items-center gap-1">
    Website<i class="fas fa-globe"></i> 
</a>

<form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="hover:text-gray-300 transition-colors flex items-center gap-1">
        Logout<i class="fas fa-sign-out-alt"></i> 
    </button>
</form>

            </div>

        </div>
    </div>
</nav>


    <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-white shadow rounded-lg md:mr-8 h-[30vh] overflow-y-auto mb-6 md:mb-0">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.books.index') }}"
                           class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('admin.books.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Books
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.authors.index') }}"
                           class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('admin.authors.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Authors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.publications.index') }}"
                           class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('admin.publications.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Publications
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
