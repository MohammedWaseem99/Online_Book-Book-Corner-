
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 sm:py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="flex flex-col md:flex-row">
            
            <!-- Book Image -->
            <div class="w-full md:w-1/3 p-4 sm:p-6 md:p-8">
                @if($book->picture)
                    <img src="{{ asset('storage/' . $book->picture) }}"
                         alt="{{ $book->name }}"
                         class="w-full h-auto rounded-lg shadow-md object-cover">
                @else
                    <div class="w-full h-56 sm:h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400 text-sm sm:text-base">No Image Available</span>
                    </div>
                @endif
            </div>

            <!-- Book Details -->
            <div class="w-full md:w-2/3 p-4 sm:p-6 md:p-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 sm:mb-4 break-words">
                   Book Name :  {{ $book->name }}
                </h1>

                <div class="mb-4 sm:mb-6 text-sm sm:text-base">
                    <p class="text-gray-600 mb-1 sm:mb-2">
                        <span class="font-semibold">Author:</span> {{ $book->author->name }}
                    </p>
                    <p class="text-gray-600 mb-1 sm:mb-2">
                        <span class="font-semibold">Publication:</span> {{ $book->publication->name }}
                    </p>
                </div>

                <div class="mb-4 sm:mb-6">
                    @if($book->discount)
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-2">
                            <span class="text-2xl sm:text-3xl font-bold text-red-600">
                                ${{ number_format($book->discounted_price, 2) }}
                            </span>
                            <span class="text-lg sm:text-xl text-gray-500 line-through">
                                ${{ number_format($book->price, 2) }}
                            </span>
                            <span class="bg-red-100 text-red-600 px-2 sm:px-3 py-1 rounded-full font-semibold text-sm">
                                {{ $book->discount }}% OFF
                            </span>
                        </div>
                    @else
                        <span class="text-2xl sm:text-3xl font-bold text-gray-900">
                            ${{ number_format($book->price, 2) }}
                        </span>
                    @endif
                </div>

                <div class="prose max-w-none mb-6 sm:mb-8">
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3">Description</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        {{ $book->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Similar Books -->
    <div class="mt-8 sm:mt-12 space-y-10 sm:space-y-12">
        
        <!-- Books by Same Author -->
        @if($sameAuthorBooks->isNotEmpty())
        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">
                More by {{ $book->author->name }} - (Author)
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($sameAuthorBooks as $relatedBook)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <a href="{{ route('books.show', $relatedBook) }}">
                        @if($relatedBook->picture)
                            <img src="{{ asset('storage/' . $relatedBook->picture) }}"
                                 alt="{{ $relatedBook->name }}"
                                  class="w-full h-auto max-h-48 object-contain mt-4 mb-4"> 
                        @else
                            <div class="w-full h-40 sm:h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">No Image</span>
                            </div>
                        @endif

                        <div class="p-3 sm:p-4 ">
                            <h3 class="font-semibold text-base sm:text-lg mb-2 line-clamp-2">
                                {{ $relatedBook->name }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-red-600 font-bold text-sm sm:text-base">
                                    ${{ number_format($relatedBook->price, 2) }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Books from Same Publication -->
        @if($samePublicationBooks->isNotEmpty())
        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">
                More from {{ $book->publication->name }} - (Publication)
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($samePublicationBooks as $relatedBook)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <a href="{{ route('books.show', $relatedBook) }}">
                        @if($relatedBook->picture)
                            <img src="{{ asset('storage/' . $relatedBook->picture) }}"
                                 alt="{{ $relatedBook->name }}"
                                 class="w-full h-auto max-h-48 object-contain mt-4 mb-4"> 
                        @else
                            <div class="w-full h-40 sm:h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">No Image</span>
                            </div>
                        @endif

                        <div class="p-3 sm:p-4 ">
                            <h3 class="font-semibold text-base sm:text-lg mb-2 line-clamp-2">
                                {{ $relatedBook->name }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-red-600 font-bold text-sm sm:text-base">
                                    ${{ number_format($relatedBook->price, 2) }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
