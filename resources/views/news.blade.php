@extends('layout.master')

@section('title', 'News')

@section('content')
    <!-- Team Photo -->
    <img src="{{ asset('images/Layer_1.png') }}" alt="Our Team" class="w-full -mt-5 bg-slate-700">

    <!-- Background with Activities and Mission Statement -->
    <div class="relative min-h-screen bg-cover flex items-center justify-center" style="background-image: url('{{ asset('images/image.png') }}')">
        <div class="relative w-full flex flex-col items-center">
            <!-- Activities Section -->
            <div class="container mx-auto px-4 py-8 mt-20">
                <div class="relative bg-cover bg-center h-96 flex items-center justify-center">
                    <div class="relative z-10 text-center text-white px-4">
                        <h1 class="text-5xl font-bold mb-4">Activities</h1>
                        <div class="w-16 h-1 bg-white mx-auto mb-4"></div>
                        <p class="text-xl max-w-xl mx-auto">
                            Our enterprise is supported by a dedicated team of founders
                        </p>
                        <p class="text-xl max-w-xl mx-auto">
                            extensive experience and knowledge in the fields
                        </p>
                        <p class="text-xl max-w-xl mx-auto">
                            agriculture, and business management.
                        </p>
                    </div>
                </div>

                <!-- Mission Statement -->
                <div class="text-center py-12 mt-100">
                    <p class="text-lg max-w-3xl mx-auto">
                        We work together in unity and with a shared vision to drive the future of the agricultural sector toward sustainability and transparency.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Section -->
    <div class="container mx-auto px-4 py-16">
        @foreach($events as $event)
            <div class="flex flex-col md:flex-row items-center mb-8 bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="w-full md:w-1/2">
                    <!-- Display only the first image -->
                    <img src="{{ asset('storage/' . $event->images->first()->image_path) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover">
                </div>
                <div class="w-full md:w-1/2 p-6">
                    <p class="text-gray-700 mb-4">{{ $event->description }}</p>
                    <a href="{{ route('event.detail', $event->id) }}" class="inline-block bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-full">
                        Read Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
