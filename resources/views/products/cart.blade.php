@extends('layout.master')

@section('content')
<div class="relative min-h-screen w-full bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset("images/ourpro.png") }}')">
<div class="absolute w-full h-[50px] top-0 left-0 z-40 bg-cover bg-center" style="background-image: url('{{ asset('images/Layer_1.png') }}')">
            </div>
<div class="container mx-auto px-4 py-8 mt-30">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
<div class="overflow-x-auto rounded-lg shadow-md">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Image
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @php $totalPrice = 0; @endphp
            @foreach($products as $product)
                @php
                    $quantity = (int)($cart[$product->id] ?? 0);
                    $itemTotal = $product->price * $quantity;
                    $totalPrice += $itemTotal;
                @endphp
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-16 w-16">
                                <img class="h-16 w-16 object-contain rounded"
                                     src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/iol.png') }}"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${{ number_format($product->price, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <form action="{{ route('cart.decrement', $product->id) }}" method="POST" class="flex">
                                @csrf
                                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-1 px-3 rounded-l focus:outline-none">
                                    -
                                </button>
                            </form>
                            <input type="text" value="{{ $quantity }}" readonly class="w-12 text-center border-t border-b border-gray-300 bg-gray-50">
                            <form action="{{ route('cart.increment', $product->id) }}" method="POST" class="flex">
                                @csrf
                                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-1 px-3 rounded-r focus:outline-none">
                                    +
                                </button>
                            </form>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${{ number_format($itemTotal, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


        <div class="mt-6 flex justify-end">
            <h2 class="text-xl font-bold">Total: ${{ number_format($totalPrice, 2) }}</h2>
        </div>

        <div class="mt-6 flex justify-end">
 <a href="{{ route('products.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Continue Shopping
            </a>
        </div>
        <div class="mt-6">
                <form action="{{ route('checkout.process') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    <h2 class="text-xl font-bold mb-4">Checkout Information</h2>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                        <input type="text" id="phone_number" name="phone_number" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                        <input type="text" id="location" name="location" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
    @else
        <p class="text-center py-8">Your cart is empty.</p>
        <div class="flex justify-center">
            <a href="{{ route('products.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Continue Shopping
            </a>
        </div>
    @endif
</div>
</div>
@endsection
