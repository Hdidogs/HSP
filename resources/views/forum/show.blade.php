<x-app-layout>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
    </script>
