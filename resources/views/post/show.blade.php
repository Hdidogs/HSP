<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">{{ $post->titre }}</h1>
        <p>Description: {{ $post->description }}</p>
        <p>Créé par: {{ $post->ref_user }}</p>
        <p>Forum: {{ $post->ref_forum }}</p>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</x-app-layout>
