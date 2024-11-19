<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium mb-4">Liste des étudiants</h3>
                    <ul class="space-y-2">
                        @php
                            $etudiants = [
                                ['id' => 1, 'nom' => 'Dupont', 'prenom' => 'Jean'],
                                ['id' => 2, 'nom' => 'Martin', 'prenom' => 'Marie'],
                                ['id' => 3, 'nom' => 'Lefebvre', 'prenom' => 'Sophie'],
                                ['id' => 4, 'nom' => 'Dubois', 'prenom' => 'Pierre'],
                                ['id' => 5, 'nom' => 'Moreau', 'prenom' => 'Claire'],
                            ];
                        @endphp

                        @foreach($etudiants as $etudiant)
                            <li class="flex items-center justify-between p-2 bg-gray-50 rounded-md">
                                <span class="font-medium">{{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}</span>
                                <a href="{{ route('admin.show') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Voir plus
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>