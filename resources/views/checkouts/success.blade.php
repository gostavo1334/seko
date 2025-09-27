<!-- resources/views/checkout/success.blade.php -->

@extends('layout.master')

@section('content')
<div class="relative min-h-screen w-full bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset("images/ourpro.png") }}')">
    <div class="absolute w-full h-[50px] top-0 left-0 z-40 bg-cover bg-center" style="background-image: url('{{ asset('images/Layer_1.png') }}')"></div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-3xl font-bold mb-6">Thank You for Your Order!</h1>
            <p class="mb-4">Your order has been placed successfully. We will contact you soon at the provided phone number.</p>
            <a href="{{ route('products.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Continue Shopping
            </a>
        </div>
    </div>
</div>
@endsection
