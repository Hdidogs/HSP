<x-app-layout>
    <div class="container">
        <h1 class="text-center">Modifier une Spécialité</h1>

        <form action="{{ route('specialite.update', $specialite->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" name="libelle" id="libelle" class="form-control" value="{{ $specialite->libelle }}" required>
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour</button>
            <a href="{{ route('specialite.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</x-app-layout>
