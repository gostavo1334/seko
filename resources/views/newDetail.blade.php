{{-- @extends('layout.master')

@section('title', 'Event Detail')

@section('content')

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

    <!-- Image Gallery -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($event->images as $image)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover">
                </div>
            @endforeach
        </div>

        <!-- Description -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg text-gray-700 mb-4">
                Initiative: <strong>Health Fund</strong> – A group of professors, students, product brand teams, farmers, pharmacies, and the Khmer citizens have brought charitable aid including food supplies, medicines, health products, educational materials, and other necessities to the frontline troops and displaced citizens in Udor Meanchey province.
            </p>
            <p class="text-lg text-gray-700 mb-4">
                This initiative is a collaborative effort to support those who have contributed to the national cause and the integrity of the territory.
            </p>
        </div>
    </div>
@endsection --}}
