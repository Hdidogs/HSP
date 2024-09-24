<x-app-layout>
        <h1>Modifier l'activité</h1>

        <form action="{{ route('activite.update', $activite) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" value="{{ $activite->titre }}">

            <label for="desc">Description :</label>
            <textarea name="desc" id="desc">{{ $activite->desc }}</textarea>

            <label for="nb_place">Nombre de places :</label>
            <input type="number" name="nb_place" id="nb_place" value="{{ $activite->nb_place }}">

            <label for="ref_user">Référence utilisateur :</label>
            <input type="number" name="ref_user" id="ref_user" value="{{ $activite->ref_user }}">

            <button type="submit">Mettre à jour</button>
        </form>
</x-app-layout>
