<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Posts</h1>
                    <a href="{{ route('post.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create
                        New Post</a>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($posts as $post)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold mb-2">{{ $post->titre }}</h2>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                                    <p class="text-sm text-gray-500">Posted by {{ $post->user->name }} in
                                        {{ $post->forum->nom }}</p>
                                    <div class="mt-4">
                                        <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>