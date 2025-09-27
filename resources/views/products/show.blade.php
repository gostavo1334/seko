@extends('layout.master')

@section('content')
<div class="relative min-h-screen w-full bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset("images/ourpro.png") }}')">
<div class="absolute w-full h-[50px] top-0 left-0 z-40 bg-cover bg-center" style="background-image: url('{{ asset('images/Layer_1.png') }}')">
            </div>
<div class="container mx-auto px-4 py-12 mt-35">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Product Image Section -->
        <div class="w-full md:w-1/2 p-8 flex items-center justify-center bg-gray-50">
            <img
                src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/iol.png') }}"
                alt="{{ $product->name }}"
                class="max-w-full h-auto max-h-96 object-contain"
            >
        </div>

        <!-- Product Details Section -->
        <div class="w-full md:w-1/2 p-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="text-gray-500 mt-2">{{ $product->description }}</p>
            </div>

            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <span class="text-lg font-semibold text-gray-600 mr-4">Ingredients:</span>
                </div>
                <p class="text-gray-700 ml-4">{!!$product->ingredients!!}</p>
            </div>

            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <span class="text-lg font-semibold text-gray-600 mr-4">Usage Instructions:</span>
                </div>
                <p class="text-gray-700 ml-4">{{ $product->usage_instructions }}</p>
            </div>

            <div class="mb-6">
                <div class="text-3xl font-bold text-gray-800">${{ number_format($product->price, 2) }}</div>
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-6">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300"
                >
                    ADD TO CART
                </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
