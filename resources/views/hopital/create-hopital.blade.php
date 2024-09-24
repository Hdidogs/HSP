<x-action-section>
    <h1>Ajouter un nouvel Hôpital</h1>

    @csrf
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="rue">Rue :</label>
    <input type="text" id="rue" name="rue" required><br>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required><br>

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" required><br>

    <label for="cp">Code Postal :</label>
    <input type="text" id="cp" name="cp" required><br>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Crée.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Créer') }}
        </x-button>
    </x-slot>
</x-action-section>
