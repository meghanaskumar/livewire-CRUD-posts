<div class="container max-w-lg mt-10">
    @if (session()->has('message'))
        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

         <a href="{{ route('list-posts') }}" class="inline-block px-3 py-1 mb-5 text-black bg-gray-300 rounded-lg hover:bg-gray-600 focus:outline-none focus:bg-grey-700">
            Back to Posts
        </a>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Title:</label>
            <input type="text" wire:model.defer="title" id="title" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description:</label>
            <textarea wire:model.defer="description" id="description" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block mb-2 text-sm font-bold text-gray-700">Image:</label>
            <input type="file" wire:model="image" id="image" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline">Create Post</button>
   </div>   
</div>