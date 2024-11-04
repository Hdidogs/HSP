<x-app-layout>
<<<<<<< HEAD
    <div class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
                <div class="p-6 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                        <div class="mb-4 sm:mb-0">
                            <h1
                                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
                                {{ $forum->nom }}</h1>
                            <p class="mt-2 text-sm text-gray-600">Créé par <span
                                    class="font-medium text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 mb-6">{{ $forum->user->nom }}</span></p>
                        </div>
                        <a href="{{ route('forum.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                            <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Retour aux forums
                        </a>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-lg shadow-inner p-6">
                        <h2
                            class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 mb-6">
                            Chat du forum</h2>
                        <div id="chat-messages"
                            class="space-y-4 h-96 overflow-y-auto mb-6 p-4 bg-white rounded-lg shadow-inner">
                            <!-- Les messages seront ajoutés ici dynamiquement -->
                        </div>
                        <form method="POST" action="{{ route('login') }}" id="chat-form" class="mt-6">
                            <div class="flex rounded-md shadow-sm">
                                <input type="text" id="chat-input"
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
=======
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">Forum Chat</h1>

                    <h2 class="text-2xl font-bold mb-4">Comments</h2>
                    <div id="chat-messages" class="space-y-4 mb-4">
                        @foreach ($messages as $message)
                            <div class="bg-gray-100 p-4 rounded-lg" id="message-{{ $message->id }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold">{{ $message->sender->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $message->created_at->diffForHumans() }}</p>
                                    </div>
                                    @if (Auth::id() === $message->ref_user)
                                        <div>
                                            <button onclick="editMessage({{ $message->id }})"
                                                class="text-blue-500 hover:underline mr-2">Edit</button>
                                            <button onclick="deleteMessage({{ $message->id }})"
                                                class="text-red-500 hover:underline">Delete</button>
                                        </div>
                                    @endif
                                </div>
                                <p class="mt-2 message-content">{{ $message->libelle }}</p>
                                <div class="mt-2 flex items-center space-x-4">
                                    <button onclick="upvoteMessage({{ $message->id }})"
                                        class="text-gray-600 hover:text-blue-600">
                                        👍 <span class="upvote-count">{{ $message->upvote }}</span>
                                    </button>
                                    <button onclick="downvoteMessage({{ $message->id }})"
                                        class="text-gray-600 hover:text-red-600">
                                        👎 <span class="downvote-count">{{ $message->downvote }}</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <form id="chat-form" class="mt-4">
                        @csrf
                        <textarea id="chat-input" name="libelle" rows="3"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            placeholder="Type your comment..."></textarea>
                        <button type="submit"
                            class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Post Comment
                        </button>
                    </form>
>>>>>>> 76e71ac03d2d4080db6b8bda745d3846595741ce
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const chatForm = document.getElementById('chat-form');
            const chatInput = document.getElementById('chat-input');
            const chatMessages = document.getElementById('chat-messages');

            chatForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const message = chatInput.value.trim();
                if (message) {
                    axios.post('{{ route("messages.store") }}', {
                        libelle: message
                    })
                        .then(function (response) {
                            const newMessage = response.data;
                            const messageElement = document.createElement('div');
                            messageElement.className = 'bg-gray-100 p-4 rounded-lg';
                            messageElement.id = `message-${newMessage.id}`;
                            messageElement.innerHTML = `
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold">${newMessage.sender.name}</p>
                                        <p class="text-sm text-gray-600">Just now</p>
                                    </div>
                                    <div>
                                        <button onclick="editMessage(${newMessage.id})" class="text-blue-500 hover:underline mr-2">Edit</button>
                                        <button onclick="deleteMessage(${newMessage.id})" class="text-red-500 hover:underline">Delete</button>
                                    </div>
                                </div>
                                <p class="mt-2 message-content">${newMessage.libelle}</p>
                                <div class="mt-2 flex items-center space-x-4">
                                    <button onclick="upvoteMessage(${newMessage.id})" class="text-gray-600 hover:text-blue-600">
                                        👍 <span class="upvote-count">0</span>
                                    </button>
                                    <button onclick="downvoteMessage(${newMessage.id})" class="text-gray-600 hover:text-red-600">
                                        👎 <span class="downvote-count">0</span>
                                    </button>
                                </div>
                            `;
                            chatMessages.insertBefore(messageElement, chatMessages.firstChild);
                            chatInput.value = '';
                        })
                        .catch(function (error) {
                            console.error('Error:', error);
                        });
                }
            });

            function upvoteMessage(messageId) {
                axios.post(`/messages/${messageId}/upvote`)
                    .then(function (response) {
                        const upvoteCount = document.querySelector(`#message-${messageId} .upvote-count`);
                        upvoteCount.textContent = response.data.upvote;
                    })
                    .catch(function (error) {
                        console.error('Error:', error);
                    });
            }
<<<<<<< HEAD
        });
    </script>
</x-app-layout>
=======

            function downvoteMessage(messageId) {
                axios.post(`/messages/${messageId}/downvote`)
                    .then(function (response) {
                        const downvoteCount = document.querySelector(`#message-${messageId} .downvote-count`);
                        downvoteCount.textContent = response.data.downvote;
                    })
                    .catch(function (error) {
                        console.error('Error:', error);
                    });
            }

            function editMessage(messageId) {
                const messageElement = document.querySelector(`#message-${messageId} .message-content`);
                const currentContent = messageElement.textContent;
                const input = document.createElement('textarea');
                input.value = currentContent;
                input.className = 'w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none';
                messageElement.replaceWith(input);
                input.focus();

                input.addEventListener('blur', function () {
                    const newContent = input.value.trim();
                    if (newContent !== currentContent) {
                        axios.put(`/messages/${messageId}`, { libelle: newContent })
                            .then(function (response) {
                                const updatedMessage = document.createElement('p');
                                updatedMessage.className = 'mt-2 message-content';
                                updatedMessage.textContent = response.data.libelle;
                                input.replaceWith(updatedMessage);
                            })
                            .catch(function (error) {
                                console.error('Error:', error);
                                input.replaceWith(messageElement);
                            });
                    } else {
                        input.replaceWith(messageElement);
                    }
                });
            }

            function deleteMessage(messageId) {
                if (confirm('Are you sure you want to delete this message?')) {
                    axios.delete(`/messages/${messageId}`)
                        .then(function (response) {
                            const messageElement = document.querySelector(`#message-${messageId}`);
                            messageElement.remove();
                        })
                        .catch(function (error) {
                            console.error('Error:', error);
                        });
                }
            }
        </script>
    @endpush
</x-app-layout>
>>>>>>> 76e71ac03d2d4080db6b8bda745d3846595741ce
