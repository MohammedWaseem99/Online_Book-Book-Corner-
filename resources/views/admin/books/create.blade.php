
@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg max-w-4xl mx-auto">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-bold">Add New Book</h2>
    </div>

    <div class="p-6">
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Book Name</label>
                    <input type="text" name="name" id="name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" step="0.01" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
                    <select name="author_id" id="author_id" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="publication_id" class="block text-sm font-medium text-gray-700">Publication</label>
                    <select name="publication_id" id="publication_id" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select Publication</option>
                        @foreach($publications as $publication)
                            <option value="{{ $publication->id }}">{{ $publication->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                </div>

                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-700">Book Picture</label>
                    <input type="file" name="picture" id="picture"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount (%)</label>
                    <input type="number" name="discount" id="discount" step="0.01" min="0" max="100"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.books.index') }}"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-3 hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Book
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
