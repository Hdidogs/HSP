<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">
            {{ __('Panel Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-10">
                    <div class="mb-8">
                        <nav class="flex space-x-4" aria-label="Tabs">
                            <button
                                class="tab-button px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-pending" aria-controls="pending-content" role="tab">
                                Étudiants en attente
                            </button>
                            <button
                                class="tab-button px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-all" aria-controls="all-content" role="tab">
                                Tous les utilisateurs
                            </button>
                            <button
                                class="tab-button px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-validated" aria-controls="validated-content" role="tab">
                                Utilisateurs validés
                            </button>
                        </nav>
                    </div>

                    <div id="pending-content" class="tab-content">
                        <div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <h3 class="text-2xl font-bold text-gray-900">Étudiants en attente de validation</h3>
                            <div class="flex space-x-4">
                                <div class="relative">
                                    <input type="text" id="search" placeholder="Rechercher un étudiant..."
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <div class="absolute left-3 top-2.5">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <button
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Ajouter un étudiant
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table id="table"
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Nom</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Email</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date d'inscription</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users->where('email_verified_at', null) as $user)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->nom }}
                                            {{ $user->prenom }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="editUser({{ $user->id }})"
                                                        class="text-blue-600 hover:text-blue-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </button>
                                                <button onclick="deleteUser({{ $user->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button onclick="openContactModal('{{ $user->email }}')"
                                                        class="text-green-600 hover:text-green-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="all-content" class="tab-content hidden">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Tous les utilisateurs</h3>
                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table id="table"
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Nom</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Email</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date d'inscription</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->nom }}
                                            {{ $user->prenom }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="deleteUser({{ $user->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button onclick="openContactModal('{{ $user->email }}')"
                                                        class="text-green-600 hover:text-green-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="validated-content" class="tab-content hidden">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Utilisateurs validés</h3>
                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table id="table"
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Nom</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Email</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date d'inscription</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users->whereNotNull('email_verified_at') as $user)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->nom }}
                                            {{ $user->prenom }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="cancelValidation({{ $user->id }})"
                                                        class="text-yellow-600 hover:text-yellow-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-10">
                    <div class="mb-8">
                        <nav class="flex space-x-4" aria-label="Tabs-ticket">
                            <button
                                class="tab-button-ticket px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-pending-ticket" aria-controls="pending-content-ticket" role="tab">
                                Tickets en attente
                            </button>
                            <button
                                class="tab-button-ticket px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-all-ticket" aria-controls="all-content-ticket" role="tab">
                                Tous les tickets
                            </button>
                            <button
                                class="tab-button-ticket px-5 py-2 font-medium text-sm rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="tab-validated-ticket" aria-controls="validated-content-ticket" role="tab">
                                Tickets traités
                            </button>
                        </nav>
                    </div>

                    <div id="pending-content-ticket" class="tab-content-ticket">
                        <div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <h3 class="text-2xl font-bold text-gray-900">Tickets en attente de validation</h3>
                            <div class="flex space-x-4">
                                <div class="relative">
                                    <input type="text" id="search-ticket" placeholder="Rechercher un ticket..."
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <div class="absolute left-3 top-2.5">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Objet</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Description</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date de création</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Importance</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $ticket->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $ticket->objet }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $ticket->description }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $ticket->date }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $ticket->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="deleteUser({{ $user->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button onclick="openContactModal('{{ $user->email }}')"
                                                        class="text-green-600 hover:text-green-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="all-content-ticket" class="tab-content-ticket hidden">
                        <div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <h3 class="text-2xl font-bold text-gray-900">Tout les tickets</h3>
                            <div class="flex space-x-4">
                                <div class="relative">
                                    <input type="text" id="search-ticket" placeholder="Rechercher un ticket..."
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <div class="absolute left-3 top-2.5">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Objet</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Description</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date de création</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Importance</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->nom }}
                                            {{ $user->prenom }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="deleteUser({{ $user->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button onclick="openContactModal('{{ $user->email }}')"
                                                        class="text-green-600 hover:text-green-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="validated-content-ticket" class="tab-content-ticket hidden">
                        <div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                            <h3 class="text-2xl font-bold text-gray-900">Tickets traités</h3>
                            <div class="flex space-x-4">
                                <div class="relative">
                                    <input type="text" id="search-ticket" placeholder="Rechercher un ticket..."
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <div class="absolute left-3 top-2.5">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>                        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            <table
                                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                <thead>
                                <tr class="text-left">
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Objet</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Description</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Date de création</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Importance</th>
                                    <th
                                        class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users->whereNotNull('email_verified_at') as $user)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->id }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->nom }}
                                            {{ $user->prenom }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">{{ $user->email }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.show', ['id' => $user->id]) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button onclick="cancelValidation({{ $user->id }})"
                                                        class="text-yellow-600 hover:text-yellow-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de contact -->
    <div id="contactModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Contacter l'étudiant
                    </h3>
                    <div class="mt-2">
                        <form id="contactForm">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       readonly>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-medium text-gray-700">Objet</label>
                                <input type="text" name="subject" id="subject"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea name="message" id="message" rows="4"
                                          class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            onclick="sendEmail()">
                        Envoyer
                    </button>
                    <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            onclick="closeContactModal()">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-button');
            const contents = document.querySelectorAll('.tab-content');

            const tabs_tickets = document.querySelectorAll('.tab-button-ticket');
            const contents_tickets = document.querySelectorAll('.tab-content-ticket');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('bg-indigo-600', 'text-white'));
                    tab.classList.add('bg-indigo-600', 'text-white');

                    contents.forEach(content => content.classList.add('hidden'));
                    document.getElementById(tab.getAttribute('aria-controls')).classList.remove('hidden');
                });
            });

            tabs_tickets.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs_tickets.forEach(t => t.classList.remove('bg-indigo-600', 'text-white'));
                    tab.classList.add('bg-indigo-600', 'text-white');

                    contents_tickets.forEach(content => content.classList.add('hidden'));
                    document.getElementById(tab.getAttribute('aria-controls')).classList.remove('hidden');
                });
            });

            // Set the first tab as active by default
            tabs[0].click();
            tabs_tickets[0].click();

            const searchInput = document.getElementById('search');
            const tables = document.querySelectorAll('table');

            const searchInputTicket= document.getElementById('search-ticket');
            const tablesTicket = document.querySelectorAll('table');


            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                tables.forEach(table => {
                    const rows = table.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            });

            searchInputTicket.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                tablesTicket.forEach(table => {
                    const rows = table.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            });

            tables.forEach(table => {
                table.querySelectorAll('th').forEach(header => {
                    header.addEventListener('click', () => {
                        const isNumeric = header.textContent.trim() === 'ID';
                        const column = Array.from(header.parentNode.children).indexOf(header);
                        const rows = Array.from(table.querySelectorAll('tbody tr'));
                        const direction = header.classList.contains('sort-asc') ? -1 : 1;

                        rows.sort((a, b) => {
                            const aCol = a.children[column].textContent.trim();
                            const bCol = b.children[column].textContent.trim();
                            return direction * (isNumeric ? aCol - bCol : aCol.localeCompare(bCol));
                        });

                        table.querySelector('tbody').append(...rows);
                        header.classList.toggle('sort-asc');
                        header.classList.toggle('sort-desc');
                    });
                });
            });

            tablesTicket.forEach(table => {
                table.querySelectorAll('th').forEach(header => {
                    header.addEventListener('click', () => {
                        const isNumeric = header.textContent.trim() === 'ID';
                        const column = Array.from(header.parentNode.children).indexOf(header);
                        const rows = Array.from(table.querySelectorAll('tbody tr'));
                        const direction = header.classList.contains('sort-asc') ? -1 : 1;

                        rows.sort((a, b) => {
                            const aCol = a.children[column].textContent.trim();
                            const bCol = b.children[column].textContent.trim();
                            return direction * (isNumeric ? aCol - bCol : aCol.localeCompare(bCol));
                        });

                        table.querySelector('tbody').append(...rows);
                        header.classList.toggle('sort-asc');
                        header.classList.toggle('sort-desc');
                    });
                });
            });
        });

        function openContactModal(email) {
            document.getElementById('email').value = email;
            document.getElementById('contactModal').classList.remove('hidden');
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.add('hidden');
            document.getElementById('contactForm').reset();
        }

        function sendEmail() {
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            // Implement the actual email sending logic here
            console.log('Sending email to:', email);
            console.log('Subject:', subject);
            console.log('Message:', message);

            closeContactModal();
            alert('Email sent successfully!');
        }

        function editUser(userId) {
            // Implement the edit user logic here
            console.log('Editing user with ID:', userId);
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                // Implement the delete user logic here
                console.log('Deleting user with ID:', userId);
            }
        }

        function cancelValidation(userId) {
            if (confirm('Are you sure you want to cancel the validation for this user?')) {
                // Implement the cancel validation logic here
                console.log('Cancelling validation for user with ID:', userId);
            }
        }
    </script>

    <style>
        /* Custom styles for a more modern look */
        .tab-button {
            transition: all 0.3s ease;
        }

        .tab-button:hover {
            transform: translateY(-2px);
        }

        table {
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr:hover {
            background-color: rgba(249, 250, 251, 0.8);
        }

        .shadow-custom {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</x-app-layout>
