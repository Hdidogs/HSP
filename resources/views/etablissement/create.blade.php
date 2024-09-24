<x-app-layout>
    <h1>Ajouter un établissement</h1>

    <form action="{{ route('etablissement.store') }}" method="POST">
        @csrf
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>

        <label for="adresseweb">AdresseWeb :</label>
        <input type="text" name="adresseweb" id="adresseweb" required>

        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" required>

        <label for="code_postal">Code Postal :</label>
        <input type="text" name="code_postal" id="code_postal" required>

        <label for="pays">Pays :</label>
        <input type="text" name="pays" id="pays" required>

        <button type="submit">Ajouter</button>
    </form>
</x-app-layout>
