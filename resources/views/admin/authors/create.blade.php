
@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg max-w-4xl mx-auto">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-bold">Add New Author</h2>
    </div>

    <div class="p-6">
        <form action="{{ route('admin.authors.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Author Name</label>
                    <input type="text" name="name" id="name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                    <textarea name="bio" id="bio" rows="6"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Enter author biography..."></textarea>
                    @error('bio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.authors.index') }}"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-3 hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Author
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
