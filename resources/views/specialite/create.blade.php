<x-app-layout>
    <div class="container">
        <h1 class="text-center">Ajouter une Spécialité</h1>

        <form action="{{ route('specialite.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" name="libelle" id="libelle" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('specialite.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</x-app-layout>
