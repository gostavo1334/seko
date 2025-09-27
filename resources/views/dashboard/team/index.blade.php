<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Member') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Our Team</h1>
        <a href="{{ route('team.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Add Team Member
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($teamMembers as $member)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="w-full h-64 overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ $member->image_path ? asset('storage/' . $member->image_path) : 'https://via.placeholder.com/400' }}" alt="{{ $member->name }}">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-bold mb-2">{{ $member->name }}</h2>
                <p class="text-gray-700 mb-4">{{ $member->role }}</p>
                <p class="text-gray-600">{{ Str::limit($member->description, 100) }}</p>
                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('team.edit', $member->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                    <form action="{{ route('team.destroy', $member->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-app-layout>
