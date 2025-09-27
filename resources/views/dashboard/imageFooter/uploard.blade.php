<!-- resources/views/dashboard/imageFooter/upload.blade.php -->

<x-app-layout>
    <div class="container">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

<!-- resources/views/dashboard/imageFooter/uploard.blade.php -->

<form action="{{ route('dashboard.imageFooter.uploard') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="images">
            Upload Images
        </label>
        <input type="file" name="images[]" id="image_path" multiple class="border rounded w-full py-2 px-3">
    </div>
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Upload Images
    </button>
</form>


        <!-- Display Uploaded Images -->
        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-4">Uploaded Images</h2>
            <div class="flex flex-wrap gap-4">
                @forelse($processImages as $processImage)
<div class="flex items-center">
    <img
        class="h-20 w-20 rounded-md object-cover mr-3 border-2 border-gray-300"
        src="{{ asset($processImage->image_path) }}"
    >
    <form action="{{ route('images.destroy', $processImage->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>

</div>
                @empty
                    <p>No images uploaded yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
