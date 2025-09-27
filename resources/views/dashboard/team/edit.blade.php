<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Team Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $teamMember->name) }}" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                            <input type="text" name="role" id="role" value="{{ old('role', $teamMember->role) }}" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea name="description" id="description" class="w-full p-2 border rounded">{{ old('description', $teamMember->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                            <input type="file" name="image" id="image" class="w-full p-2 border rounded">
                            @if($teamMember->image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $teamMember->image_path) }}" alt="{{ $teamMember->name }}" class="h-20 object-contain">
                                    <p class="text-sm text-gray-500 mt-1">Current image</p>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
                            <a href="{{ route('team.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
