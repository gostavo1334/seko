<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Member') }}
        </h2>
    </x-slot>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Add Team Member</h1>

    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
            <input type="text" name="role" id="role" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full p-2 border rounded" required></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" name="image" id="image" class="w-full p-2 border rounded">
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('team.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </div>
    </form>
</div>

</x-app-layout>
