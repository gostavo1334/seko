<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload News') }}
        </h2>
    </x-slot>
      <div class="container mx-auto px-4 py-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

      <form action="{{ route('upload.event') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
        <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
        <textarea id="description" name="description" class="w-full px-3 py-2 border rounded-lg" required></textarea>
    </div>

    <div class="mb-4">
        <label for="images" class="block text-gray-700 font-medium mb-2">Images</label>
        <input type="file" id="images" name="images[]" class="w-full px-3 py-2 border rounded-lg" multiple required>
    </div>

    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
        Upload Event
    </button>
</form>
<!-- List of existing events with edit and delete options -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4">Existing Events</h2>
            <div class="space-y-4">
                @foreach($events as $event)
                    <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
                        <div>
                            <h3 class="font-bold">{{ $event->title }}</h3>
                            <p class="text-gray-600">{{ Str::limit($event->description, 50) }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('event.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
