<x-app-layout>
    <div class="container">
        <h1 class="text-center">Gestionnaires</h1>
        <a href="{{ route('gestionnaire.create') }}" class="btn btn-primary mb-3">Ajouter un Gestionnaire</a>

        <table class="table">
            <thead>
            <tr>
                <th>Référence Utilisateur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gestionnaires as $gestionnaire)
                <tr>
                    <td>{{ $gestionnaire->ref_user }}</td>
                    <td>
                        <a href="{{ route('gestionnaire.show', $gestionnaire->ref_user) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('gestionnaire.edit', $gestionnaire->ref_user) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('gestionnaire.destroy', $gestionnaire->ref_user) }}" method="POST" style="display:inline;">
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
