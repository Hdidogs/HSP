<x-app-layout>
    <div class="container">
        <h1 class="text-center">Modifier un Gestionnaire</h1>

        <form action="{{ route('gestionnaire.update', $gestionnaire->ref_user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ref_user">Référence Utilisateur</label>
                <input type="number" name="ref_user" id="ref_user" class="form-control" value="{{ $gestionnaire->ref_user }}" required>
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour</button>
            <a href="{{ route('gestionnaire.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</x-app-layout>
