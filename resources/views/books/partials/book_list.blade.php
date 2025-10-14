@if($books->isEmpty())
    <div class="col-span-full text-center py-12">
        <p class="text-gray-500 text-lg">No books found.</p>
    </div>
@else
    @foreach($books as $book)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <a href="{{ route('books.show', $book) }}" class="block h-full">
                @if($book->picture)
                    <img src="{{ asset('storage/' . $book->picture) }}" 
                         alt="{{ $book->name }}" 
                         class="w-full h-auto max-h-48 object-contain block mt-4 mb-4">
                @else
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center md:h-44 lg:h-48">
                        <span class="text-gray-400 text-sm">No Image</span>
                    </div>
                @endif

                <div class="p-4 pb-3 bg-gray-200 flex flex-col justify-between h-full">
                    
                    <div>
                       
                        <h3 class="font-semibold text-sm md:text-base mb-1 line-clamp-2 text-blue-600">
                            {{ $book->name }}
                        </h3>
                        

                        <div class="flex items-center justify-between">
                            <div>
                                @if($book->discount)
                                    <div class="flex items-center space-x-1">
                                        <span class="text-red-600 font-bold text-base md:text-lg">
                                            ${{ number_format($book->discounted_price, 2) }}
                                        </span>
                                        <span class="text-gray-500 line-through text-xs md:text-sm">
                                            ${{ number_format($book->price, 2) }}
                                        </span>
                                        <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">
                                            {{ $book->discount }}% OFF
                                        </span>
                                    </div>
                                @else
                                    <span class="text-gray-900 font-bold text-base md:text-lg">
                                        ${{ number_format($book->price, 2) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                         <p class="text-black text-xs md:text-sm mt-2 mb-0">
                        {{ $book->author ? $book->author->name : 'Unknown Author' }}
                    </p>
                    </div>

                   
                    
                </div>
            </a>
        </div>
    @endforeach
@endif
