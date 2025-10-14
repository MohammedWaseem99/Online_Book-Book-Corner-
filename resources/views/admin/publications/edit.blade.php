
@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg max-w-4xl mx-auto">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-bold">Edit Publication</h2>
    </div>

    <div class="p-6">
        <form action="{{ route('admin.publications.update', $publication) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Publication Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $publication->name) }}" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter publication name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.publications.index') }}"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-3 hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-4py-2 rounded hover:bg-blue-700">
                    Update Publication
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
