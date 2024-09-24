<x-app-layout>
    <h1>Liste des établissements</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('etablissement.create') }}">Ajouter un établissement</a>

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Pays</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etablissements as $etablissement)
            <tr>
                <td>{{ $etablissement->nom }}</td>
                <td>{{ $etablissement->adresseweb }}</td>
                <td>{{ $etablissement->ville }}</td>
                <td>{{ $etablissement->code_postal }}</td>
                <td>{{ $etablissement->pays }}</td>
                <td>
                    <a href="{{ route('etablissement.edit', $etablissement) }}">Modifier</a>
                    <form action="{{ route('etablissement.destroy', $etablissement) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
