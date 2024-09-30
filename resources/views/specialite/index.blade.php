<x-app-layout>
    <div class="container">
        <h1 class="text-center">Spécialités</h1>
        <a href="{{ route('specialite.create') }}" class="btn btn-primary mb-3">Ajouter une Spécialité</a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($specialites as $specialite)
                <tr>
                    <td>{{ $specialite->id }}</td>
                    <td>{{ $specialite->libelle }}</td>
                    <td>
                        <a href="{{ route('specialite.edit', $specialite->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('specialite.destroy', $specialite->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
