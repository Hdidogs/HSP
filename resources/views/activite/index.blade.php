<x-app-layout>
    <div x-data="activitesApp()" x-init="init()" class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Activités 🎉</h1>

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                     class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                     role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg @click="show = false" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Fermer</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span>
                </div>
            @endif

            <div class="mb-6 flex flex-col sm:flex-row gap-4">
                <div class="relative flex-grow">
                    <input type="text" id="searchInput" x-model="searchTerm" @input="search"
                           placeholder="Rechercher une activité... 🔍"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <svg class="absolute left-3 top-2.5 text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex-shrink-0">
                    <select x-model="sortBy" @change="sortActivites" class="w-full sm:w-auto px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="date">Trier par date</option>
                        <option value="titre">Trier par titre</option>
                        <option value="places">Trier par nombre de places</option>
                    </select>
                </div>
            </div>

            <div x-show="filteredActivites.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="activite in paginatedActivites" :key="activite.id">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-2 flex items-center">
                                <svg class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span x-text="activite.titre"></span>
                            </h2>
                            <p class="text-gray-600 mb-4" x-text="truncate(activite.desc, 100)"></p>
                            <p class="text-gray-600 mb-2 flex items-center">
                                <span class="mr-2">👥</span>
                                <span x-text="'Nombre de places : ' + activite.nb_place"></span>
                            </p>
                            <p class="text-gray-600 mb-2 flex items-center">
                                <span class="mr-2">🕒</span>
                                <span x-text="'Date et Heure : ' + formatDate(activite.date)"></span>
                            </p>
                            <div class="flex justify-end mt-4">
                                <a :href="'{{ route('activite.edit', '') }}/' + activite.id"
                                   class="text-yellow-500 hover:text-yellow-700 mr-2" x-tooltip="Modifier">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button @click="confirmDelete(activite.id)"
                                        class="text-red-500 hover:text-red-700" x-tooltip="Supprimer">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="filteredActivites.length === 0" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <p class="text-gray-600">Aucune activité trouvée. 😕</p>
            </div>

            <div x-show="filteredActivites.length > itemsPerPage" class="mt-8 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <button @click="prevPage" :disabled="currentPage === 1" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Précédent</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <template x-for="page in totalPages" :key="page">
                        <button @click="goToPage(page)" :class="{'bg-blue-50 border-blue-500 text-blue-600': currentPage === page, 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50': currentPage !== page}" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            <span x-text="page"></span>
                        </button>
                    </template>
                    <button @click="nextPage" :disabled="currentPage === totalPages" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Suivant</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </nav>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('activite.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center transition duration-300 ease-in-out transform hover:scale-105">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Créer une nouvelle activité
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        function activitesApp() {
            return {
                activites: @json($activites),
                searchTerm: '',
                sortBy: 'date',
                currentPage: 1,
                itemsPerPage: 9,
                init() {
                    this.sortActivites();
                },
                get filteredActivites() {
                    return this.activites.filter(activite =>
                        activite.titre.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                        activite.desc.toLowerCase().includes(this.searchTerm.toLowerCase())
                    );
                },
                get paginatedActivites() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    const end = start + this.itemsPerPage;
                    return this.filteredActivites.slice(start, end);
                },
                get totalPages() {
                    return Math.ceil(this.filteredActivites.length / this.itemsPerPage);
                },
                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },
                goToPage(page) {
                    this.currentPage = page;
                },
                search() {
                    this.currentPage = 1;
                },
                sortActivites() {
                    this.activites.sort((a, b) => {
                        if (this.sortBy === 'date') {
                            return new Date(b.date) - new Date(a.date);
                        } else if (this.sortBy === 'titre') {
                            return a.titre.localeCompare(b.titre);
                        } else if (this.sortBy === 'places') {
                            return b.nb_place - a.nb_place;
                        }
                    });
                },
                truncate(text, length) {
                    return text.length > length ? text.substring(0, length) + '...' : text;
                },
                formatDate(dateString) {
                    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                    return new Date(dateString).toLocaleDateString('fr-FR', options);
                },
                confirmDelete(activiteId) {
                    Swal.fire({
                        title: 'Êtes-vous sûr ?',
                        
                        text: "Vous ne pourrez pas revenir en arrière !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Oui, supprimer !',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `{{ route('activite.destroy', '') }}/${activiteId}`;
                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }
            }
        }
    </script>
</x-app-layout>