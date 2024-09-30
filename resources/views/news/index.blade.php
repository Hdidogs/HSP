@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Actualités</h1>

<div class="space-y-6">
    @foreach($news as $article)
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">{{ $article['title'] }}</h2>
            <p class="text-gray-600">{{ $article['date'] }}</p>
            <p class="mt-2">{{ $article['excerpt'] }}</p>
            <button class="mt-4 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Lire plus</button>
        </div>
    @endforeach
</div>
@endsection