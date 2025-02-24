<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
                <div class="p-6 sm:p-10">
                    <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
                        Edit Reply
                    </h1>
                    <form method="POST" action="{{ route('reply.update', $reply->id) }}" class="mt-6">
                        @csrf
                        @method('PUT')
                        <div class="flex rounded-full shadow-sm">
                            <input type="text" name="libelle" id="reply-input"
                                   class="flex-1 min-w-0 block w-full px-4 py-3 rounded-l-full text-gray-900 border border-purple-200 focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                                   value="{{ $reply->libelle }}" placeholder="Edit your reply...">
                            <button type="submit"
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-r-full text-white bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
