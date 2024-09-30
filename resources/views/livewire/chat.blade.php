<div>
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="space-y-4 h-64 overflow-y-auto mb-4">
            @foreach($messages as $msg)
                <div class="flex @if($msg['user'] === 'Support') justify-end @endif">
                    <div class="bg-gray-100 rounded-lg p-3 @if($msg['user'] === 'Support') bg-blue-100 @endif">
                        <p class="font-semibold">{{ $msg['user'] }}</p>
                        <p>{{ $msg['content'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <form wire:submit.prevent="sendMessage">
            <div class="flex">
                <input type="text" wire:model="message" placeholder="Tapez votre message..."
                    class="flex-1 p-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Envoyer</button>
            </div>
        </form>
    </div>
</div>