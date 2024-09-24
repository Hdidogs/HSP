<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="max-w-xl">
                    @include('hopital.create-hopital')
                </div>
            </div>
        </div>
    </div>

    <h1>Liste des Hôpitaux</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Rue</th>
            <th>Ville</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Actions</th>
        </tr>
        @foreach ($hopitaux as $hopital)
            <tr>
                <td>{{ $hopital->id }}</td>
                <td>{{ $hopital->nom }}</td>
                <td>{{ $hopital->rue }}</td>
                <td>{{ $hopital->ville }}</td>
                <td>{{ $hopital->adresse }}</td>
                <td>{{ $hopital->cp }}</td>
                <td>
                    <a href="{{ route('hopitaux.show', $hopital->id) }}">Voir</a>
                    <a href="{{ route('hopitaux.edit', $hopital->id) }}">Éditer</a>
                    <form action="{{ route('hopitaux.destroy', $hopital->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
