@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Offres d'emploi</h1>

<div class="mb-4">
    <input type="text" placeholder="Rechercher des offres..." class="w-full p-2 border rounded">
</div>

<div class="space-y-6">
    @foreach($jobOffers as $offer)
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">{{ $offer['title'] }}</h2>
            <p class="text-gray-600">{{ $offer['company'] }}</p>
            <p class="mt-2">{{ $offer['description'] }}</p>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Postuler</button>
        </div>
    @endforeach
</div>
@endsection