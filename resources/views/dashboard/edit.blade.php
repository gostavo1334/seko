<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.update', $product) }}" method="POST"
                        enctype="multipart/form-data" class="mt-8 bg-gray-50 p-6 rounded-lg">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-semibold mb-6">Edit Product</h2>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Product Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description:</label>
                            <textarea name="description" id="description" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div>
                            <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                            <textarea name="ingredients" id="ingredients" rows="12"
                                class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('ingredients', $product->ingredients) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="usage_instructions" class="block text-gray-700 font-medium mb-2">Usage
                                Instructions:</label>
                            <textarea name="usage_instructions" id="usage_instructions"
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('usage_instructions', $product->usage_instructions) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-medium mb-2">Price:</label>
                            <input type="number" step="0.01" name="price" id="price"
                                value="{{ old('price', $product->price) }}" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-medium mb-2">Image:</label>
                            <input type="file" name="image" id="image" class="border p-2 w-full">
                            @if($product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="h-20 object-contain">
                                <p class="text-sm text-gray-500 mt-1">Current product image</p>
                            </div>
                            @endif
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                Update Product
                            </button>
                            <a href="{{ route('dashboard') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
            ClassicEditor
            .create(document.querySelector('#ingredients')).catch(console.error);
</script>
