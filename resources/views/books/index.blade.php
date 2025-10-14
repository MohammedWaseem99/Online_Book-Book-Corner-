@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Search Bar -->
   <div class="mb-6 px-4">
    <div class="relative w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 mx-auto">
        <!-- Font Awesome Search Icon -->
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
            <i class="fas fa-search text-blue-500"></i>
        </div>

        <!-- Input -->
        <input type="text"
               id="searchInput"
               placeholder="Search for books..."
               value="{{ request('search') }}"
               class="w-full px-12 py-3 text-sm sm:text-base border-2 border-blue-500 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
               autocomplete="off">
    </div>
</div>



    <!-- Books Grid -->
    <div id="bookResults" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @include('books.partials.book_list', ['books' => $books])
    </div>

</div>

<!-- Live Search JS -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('searchInput');
    const results = document.getElementById('bookResults');
    let timeout;

    input.addEventListener('input', function() {
        clearTimeout(timeout);
        const query = this.value.trim();

        timeout = setTimeout(() => {
            fetch(`{{ route('books.index') }}?search=${encodeURIComponent(query)}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => results.innerHTML = html)
            .catch(err => console.error(err));
        }, 250); // debounce 250ms
    });
});
</script>
@endsection
