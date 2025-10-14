
@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg max-w-4xl mx-auto">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-bold">Edit Book</h2>
    </div>

    <div class="p-6">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Book Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $book->name) }}" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}" step="0.01" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
                    <select name="author_id" id="author_id" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="publication_id" class="block text-sm font-medium text-gray-700">Publication</label>
                    <select name="publication_id" id="publication_id" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select Publication</option>
                        @foreach($publications as $publication)
                            <option value="{{ $publication->id }}" {{ $book->publication_id == $publication->id ? 'selected' : '' }}>
                                {{ $publication->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('publication_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-700">Book Picture</label>
                    <input type="file" name="picture" id="picture"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    @if($book->picture)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Current Image:</p>
                            <img src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->name }}" class="h-20 w-20 object-cover rounded mt-1">
                        </div>
                    @endif
                    @error('picture')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount (%)</label>
                    <input type="number" name="discount" id="discount" value="{{ old('discount', $book->discount) }}" step="0.01" min="0" max="100"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    @error('discount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.books.index') }}"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-3 hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Book
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
