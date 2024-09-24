<x-app-layout>
        <h1>Créer une activité</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
       @endif
        <form action="{{ route('activite.store') }}" method="POST">
            @csrf
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required>

            <label for="desc">Description :</label>
            <textarea name="desc" id="desc">{{ old('desc') }}</textarea>

            <label for="nb_place">Nombre de places :</label>
            <input type="number" name="nb_place" id="nb_place" value="{{ old('nb_place') }}" required>
            <button type="submit">Créer</button>
        </form>
</x-app-layout>
