<x-app-layout>
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