<x-app-layout>
    <h1>Modifier un établissement</h1>

    <form action="{{ route('etablissement.update', $etablissement) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="{{ $etablissement->nom }}" required>

        <label for="adresseweb">AdresseWeb :</label>
        <input type="text" name="adresseweb" id="adresseweb" value="{{ $etablissement->adresse }}" required>

        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" value="{{ $etablissement->ville }}" required>

        <label for="code_postal">Code Postal :</label>
        <input type="text" name="code_postal" id="code_postal" value="{{ $etablissement->code_postal }}" required>

        <label for="pays">Pays :</label>
        <input type="text" name="pays" id="pays" value="{{ $etablissement->pays }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
</x-app-layout>
