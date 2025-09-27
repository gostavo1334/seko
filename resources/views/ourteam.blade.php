@extends('layout.master')
@section('content')
<div class="relative min-h-screen flex flex-col items-center">
    <!-- Our Team Section with Photo -->
    <img src="{{ asset('images/Layer_1.png') }}" alt="Our Team" class="w-full -mt-5 bg-slate-700">
    <div class="relative w-full flex flex-col items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/m.png') }}')">
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h1 class="text-white text-7xl font-bold drop-shadow-lg">Our Team</h1>
            <div class="w-40 h-2 bg-white my-4"></div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-100 to-transparent"></div>
    </div>

    <!-- Descriptive Paragraph -->
    <div class="w-full py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-lg sm:text-xl leading-relaxed">
                We work together in unity and with a shared vision to drive the future of the agricultural sector
                toward sustainability and transparency.
            </p>
        </div>
    </div>

    <!-- Team Members Section -->
    <div class="w-full bg-gray-100 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            @foreach($teamMembers as $member)
            <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Image Section -->
                <div class="md:w-1/3 p-6 flex justify-center items-center bg-green-50">
                    <div class="w-56 h-56 rounded-full overflow-hidden border-4 border-green-700 flex items-center justify-center">
                        <img src="{{ $member->image_path ? asset('storage/' . $member->image_path) : asset('images/default_team_member.jpg') }}"
                             alt="{{ $member->name }}" class="w-full h-full object-cover">
                    </div>
                </div>
                <!-- Text Section -->
                <div class="md:w-2/3 p-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-green-800">{{ $member->name }}</h1>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ $member->role }}</h2>
                    <div class="border-l-4 border-green-700 pl-4">
                        <p class="text-gray-700 text-justify">
                            {{ $member->description }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
