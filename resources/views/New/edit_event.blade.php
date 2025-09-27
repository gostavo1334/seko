<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload News') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Event</h1>

        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ $event->title }}" class="w-full px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 border rounded-lg" required>{{ $event->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="images" class="block text-gray-700 font-medium mb-2">Add More Images</label>
                <input type="file" id="images" name="images[]" class="w-full px-3 py-2 border rounded-lg" multiple>
            </div>

            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
                Update Event
            </button>
        </form>
    </div>
</x-app-layout>
