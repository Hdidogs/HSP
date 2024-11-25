<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
                <div class="p-6 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                        <div class="mb-4 sm:mb-0">
                            <h1
                                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
                                {{ $message->libelle }}</h1>
                            </div>
                        <a href="{{ route('forum.show', $forum->id) }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                            <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Retour au forum
                        </a>
                    </div>
                        <div id="chat-messages" class="space-y-4 h-96 overflow-y-auto mb-6 p-4 bg-white rounded-lg shadow-inner">
                            @foreach($replies as $reply)
                                <div class="bg-gray-100 p-4 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-semibold">{{ $reply->sender->nom . " " . $reply->sender->prenom }}</p>
                                            <p class="text-sm text-gray-600">{{ $reply->created_at->diffForHumans() }}</p>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 bg-white rounded-full px-3 py-1">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('forum.edit', $forum->id) }}"
                                                   class="text-yellow-600 hover:text-yellow-800 transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $forum->id }}"
                                                      action="{{ route('forum.destroy', $forum->id) }}" method="POST"
                                                      class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="text-red-600 hover:text-red-800 transition duration-300 ease-in-out"
                                                            onclick="confirmDelete('delete-form-{{ $forum->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                             fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                  clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-start mb-2">
                                        <p class="mt-2 message-content">{{ $reply->libelle }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <form method="POST" action="{{ route('reply.store') }}" id="chat-form" class="mt-6">
                            @csrf
                            <input type="hidden" name="ref_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="ref_forum" value="{{ $forum->id }}">
                            <input type="hidden" name="ref_message" value="{{ $message->id }}">
                            <div class="flex rounded-full shadow-sm">
                                <input type="text" name="libelle" id="chat-input"
                                       class="flex-1 min-w-0 block w-full px-4 py-3 rounded-l-full text-gray-900 border border-purple-200 focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                                       placeholder="Écrivez votre message...">
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-r-full text-white bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                    </svg>
                                    Envoyer
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #chat-messages::-webkit-scrollbar {
            display: none;
        }
        #chat-messages {
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chatMessages = document.getElementById('chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    </script>
</x-app-layout>
