<x-app-layout>
    <div class="container">
        <h1 class="text-center">Ajouter un Gestionnaire</h1>

        <form action="{{ route('gestionnaire.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ref_user">Référence Utilisateur</label>
                <input type="number" name="ref_user" id="ref_user" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('gestionnaire.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</x-app-layout>
