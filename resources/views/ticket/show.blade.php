<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="py-4 px-6 bg-gray-100 border-b">
                <h1 class="text-2xl font-bold text-gray-800">Détails du ticket</h1>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold mb-2">{{ $ticket->objet }}</h2>
                        <p class="text-gray-600 mb-4">{{ $ticket->description }}</p>
                        <p class="text-sm text-gray-500">
                            <span class="font-semibold">Utilisateur:</span> {{ $ticket->user->nom }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <span class="font-semibold">Importance:</span>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $ticket->importance->libelle === 'Haute' ? 'bg-red-100 text-red-800' :
    ($ticket->importance->libelle === 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                {{ $ticket->importance->libelle }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-500">
                            <span class="font-semibold">Date:</span> {{ $ticket->date }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Chat</h3>
                        <div id="chat-messages" class="bg-gray-100 h-64 overflow-y-auto p-4 rounded-lg mb-4">
                            <!-- Les messages seront ajoutés ici dynamiquement -->
                            @foreach($messages as $message)
                                    <div class="bg-white p-2 rounded-lg shadow mb-2 text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $message->user->nom . " " . $message->user->prenom }}</p>
                                        <p class="text-sm text-gray-600">{{ $message->created_at->diffForHumans() }}</p>
                                    </div>
                                    {{ $message->libelle }}
                                </div>
                            @endforeach
                        </div>
                        <form method="POST" action="{{ route('messagesticket.store') }}" id="chat-form" class="flex">
                            @csrf
                            <input type="hidden" name="ref_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="ref_ticket" value="{{ $ticket->id }}">
                            <input type="text" name="libelle" id="chat-input"
                                class="flex-grow px-3 py-2 border rounded-l-lg focus:outline-none focus:border-blue-500"
                                placeholder="Écrivez votre message...">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg transition duration-300 ease-in-out">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('ticket.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Retour à la liste
                    </a>
                    <div>
                        <a href="{{ route('ticket.edit', $ticket->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out mr-2">
                            Modifier
                        </a>
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
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
