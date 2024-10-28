<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $forum->nom }}</h1>
                        <p class="text-gray-600">Créé par: {{ $forum->user->name }}</p>
                    </div>
                    <a href="{{ route('forum.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Retour aux forums
                    </a>
                </div>

                <div class="bg-gray-100 rounded-lg p-4 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Chat du forum</h2>
                    <div id="chat-messages" class="h-64 overflow-y-auto mb-4 p-2 bg-white rounded">
                        <!-- Les messages seront ajoutés ici dynamiquement -->
                    </div>
                    <form id="chat-form" class="flex">
                        <input type="text" id="chat-input"
                            class="flex-grow px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Écrivez votre message...">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-md transition duration-300 ease-in-out">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');
        const chatMessages = document.getElementById('chat-messages');

        chatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (message) {
                // Ici, vous devriez envoyer le message au serveur via une requête AJAX
                // Pour cet exemple, nous allons simplement l'ajouter au DOM
                const messageElement = document.createElement('div');
                messageElement.textContent = message;
                messageElement.className = 'bg-blue-100 p-2 rounded mb-2';
                chatMessages.appendChild(messageElement);
                chatInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });
    </script>
</x-app-layout>