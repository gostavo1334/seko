<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Product List -->
                    <div class="overflow-x-auto mb-8 rounded-lg shadow-sm border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($products as $index => $product)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
<td class="px-6 py-4 whitespace-nowrap">
    <div class="flex items-center">
        <img class="h-8 w-8 rounded-md object-cover mr-3"
            src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/iol.png') }}"
            alt="{{ $product->name }}">
        <span class="text-sm font-medium text-gray-900">{{ $product->name }}</span>
    </div>
</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-3">
                        <a href="{{ route('dashboard.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
                    <!-- Add Product Form -->
                    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data"
                        class="mt-8 bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-6">Add New Product</h2>
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Product Name:</label>
                            <input type="text" name="name" id="name" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description:</label>
                            <textarea name="description" id="description" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                                              <div>
                            <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                            <textarea name="ingredients" id="ingredients" rows="12"
                                class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('ingredients') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="usage_instructions" class="block text-gray-700 font-medium mb-2">Usage
                                Instructions:</label>
                            <textarea name="usage_instructions" id="usage_instructions"
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-medium mb-2">Image:</label>
                            <input type="file" name="image" id="image" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-medium mb-2">Price:</label>
                            <input type="number" step="0.01" name="price" id="price" required
                                class="border p-2 w-full rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">
                            Add Product
                        </button>
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
