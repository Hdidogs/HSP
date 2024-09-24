<x-app-layout>
        <h1>Liste des activités</h1>
        <a href="{{ route('activite.create') }}">Créer une nouvelle activité</a>

        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif

        <ul>
            @foreach ($activites as $activite)
                <li>{{ $activite->titre }} - {{ $activite->nb_place }} places</li>
                <a href="{{ route('activite.edit', $activite) }}">Modifier</a>
                <form action="{{ route('activite.destroy', $activite) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            @endforeach
        </ul>
</x-app-layout>
