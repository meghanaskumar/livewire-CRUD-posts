<div>
    <div class="flex mb-4">
        <a href="{{ route('create-post') }}"
            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
            Create Post
        </a>
    </div>
    <div class="grid grid-cols-1 gap-4 mb-10 md:grid-cols-2 lg:grid-cols-3">

        @foreach ($posts as $post)
            <div class="relative bg-white rounded-lg shadow-md">
                <img class="object-cover object-center w-full h-48" src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->title }}">
                <div class="p-6 ">
                    <a href="{{ route('edit-posts', $post) }}" wire:navigate
                        class="text-xl font-bold hover:underline hover:text-blue-500">{{ $post->title }}</a>
                    <p class="mt-2 text-gray-600">{{ $post->description }}</p>

                </div>
                <div class="mt-5">
                    <a href="#" wire:click.prevent="deletePost({{ $post->id }})"
                        class="absolute bottom-0 right-0 mb-4 mr-4 text-red-600 hover:text-red-800">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a href="#" wire:click.prevent="increaseHeartCount({{ $post->id }})"
                        class="absolute bottom-0 left-0 mb-4 ml-4 text-rose-600 hover:text-rose-800">
                        {{ $post->heart_count }}
                        <i class="fas fa-heart "></i>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>
