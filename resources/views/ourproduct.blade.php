@extends('layout.master')
@section('content')
<div class="relative min-h-screen w-full bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset("images/ourpro.png") }}')">
<div class="absolute w-full h-[50px] top-0 left-0 z-40 bg-cover bg-center" style="background-image: url('{{ asset('images/Layer_1.png') }}')">
            </div>

        <!-- Content Container -->
        <div class="relative z-10 text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-center">
            <h1 class="text-5xl sm:text-6xl font-bold mb-6">Our Products</h1>
            <div class="border-t-2 border-white w-20 mx-auto mb-8"></div>
            <p class="text-lg sm:text-xl mb-10">
                The company focuses on producing health products based on a scientific approach,
                incorporating health science, pharmaceuticals, and herbal medicine, through a team
                of herbal medicine experts from the Faculty of Pharmaceutical Sciences at the Buddhist
                University, a strategic partner.
            </p>
        </div>
    </div>

    <!-- Additional Description -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-700 text-lg sm:text-xl">
                The technology and innovation behind the products come from the agricultural by-products of
                Cambodian farmers, carefully sourced and processed before being turned into final products.
                Local raw materials selected for use include kray leaves, betel leaves, chili, lemongrass, oil,
                rice bran, and more.
            </p>
        </div>
    </div>



    <!-- Products Section -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($products as $product)
                <!-- Product 1 -->
    <div class="bg-green-50 rounded-lg p-6 flex flex-col items-center leaf-bg">
    <div
        class="rounded-lg w-72 h-72 p-6 flex flex-col items-center transition-transform duration-300 hover:scale-105 hover:shadow-lg"
        style="background-image: url('{{ asset("images/Vector.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; min-height: 400px; max-height: 400px; display: flex; align-items: center; justify-content: center;"
    >
         <a href="{{ route('products.show', $product->id) }}">
        <img
            class="max-h-48 w-auto transition-transform duration-300"
            src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/iol.png') }}"
            alt="{{ $product->name }}"
        >
         </a>
    </div>
    <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
    <p class="text-gray-700 mb-4 text-center">
        {{ $product->description }}
    </p>
<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Buy Now
    </button>
</form>



    </div>

            @endforeach
            </div>
</div>
<div
    class="bg-cover bg-center bg-no-repeat min-h-screen py-10"
    style="background-image: url('{{ asset("images/Rectangle.png") }}');"
>
    <!-- Content above the footer -->
    <div class="text-center mb-20">
        <h1 class="mt-30 text-3xl md:text-4xl font-bold text-green-800 mb-2">
            From Raw Materials to Market
        </h1>
        <p class="mt-5 text-lg text-green-700 max-w-2xl mx-auto">
            The enterprise firmly believes in delivering exceptional and value-driven solutions that exceed what customers pay for.
        </p>
    </div>

    <!-- Circular Images Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto mb-20">
    @forelse($processImages as $image)
        <div class="flex justify-center">
            <div class="relative w-64 h-64 md:w-72 md:h-72">
                <div class="absolute inset-0 rounded-full border-4 border-green-500 overflow-hidden">
                    <img src="{{ asset($image->image_path) }}" alt="Footer Image" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    @empty
        <p>No images uploaded yet.</p>
    @endforelse
</div>


</div>

<div>
      <!-- Footer -->
    <footer class="bg-green-900 text-white text-center">
        <!-- Your footer content here -->
        <h1>footer</h1>
    </footer>
</div>



@endsection






