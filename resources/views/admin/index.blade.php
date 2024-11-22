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
                    <div class="mb-4">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex" aria-label="Tabs">
                                <button
                                    class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-indigo-500 text-indigo-600"
                                    id="tab-pending" aria-controls="pending-content" role="tab">
                                    Étudiants en attente
                                </button>
                                <button
                                    class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                                    id="tab-all" aria-controls="all-content" role="tab">
                                    Tous les utilisateurs
                                </button>
                                <button
                                    class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                                    id="tab-validated" aria-controls="validated-content" role="tab">
                                    Utilisateurs validés
                                </button>
                            </nav>
                        </div>
                    </div>

                    <div id="pending-content" class="tab-content">
                        <div class="mb-4 flex justify-between items-center">
                            <h3 class="text-lg font-medium">Liste des étudiants en attente de validation</h3>
                            <div class="flex space-x-2">
                                <input type="text" id="search" placeholder="Rechercher un étudiant..."
                                    class="border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Ajouter un étudiant
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Nom
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Date d'inscription
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $etudiants = [
                                            ['id' => 1, 'nom' => 'Dupont', 'prenom' => 'Jean', 'email' => 'jean.dupont@example.com', 'date_inscription' => '2023-01-15'],
                                            ['id' => 2, 'nom' => 'Martin', 'prenom' => 'Marie', 'email' => 'marie.martin@example.com', 'date_inscription' => '2023-02-20'],
                                            ['id' => 3, 'nom' => 'Lefebvre', 'prenom' => 'Sophie', 'email' => 'sophie.lefebvre@example.com', 'date_inscription' => '2023-03-10'],
                                            ['id' => 4, 'nom' => 'Dubois', 'prenom' => 'Pierre', 'email' => 'pierre.dubois@example.com', 'date_inscription' => '2023-04-05'],
                                            ['id' => 5, 'nom' => 'Moreau', 'prenom' => 'Claire', 'email' => 'claire.moreau@example.com', 'date_inscription' => '2023-05-12'],
                                        ];
                                    @endphp

                                    @foreach($etudiants as $etudiant)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $etudiant['id'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['email'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['date_inscription'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.show', ['id' => $etudiant['id']]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Voir</a>
                                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                                                <a href="#" class="text-red-600 hover:text-red-900 mr-2">Supprimer</a>
                                                <button onclick="openContactModal('{{ $etudiant['email'] }}')"
                                                    class="text-green-600 hover:text-green-900">Contacter</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="all-content" class="tab-content hidden">
                        <h3 class="text-lg font-medium mb-4">Tous les utilisateurs</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Nom
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Date d'inscription
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($etudiants as $etudiant)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $etudiant['id'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['email'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['date_inscription'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.show', ['id' => $etudiant['id']]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Voir</a>
                                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                                                <a href="#" class="text-red-600 hover:text-red-900 mr-2">Supprimer</a>
                                                <button onclick="openContactModal('{{ $etudiant['email'] }}')"
                                                    class="text-green-600 hover:text-green-900">Contacter</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="validated-content" class="tab-content hidden">
                        <h3 class="text-lg font-medium mb-4">Utilisateurs validés</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Nom
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100">
                                            Date d'inscription
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach(array_slice($etudiants, 0, 3) as $etudiant)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $etudiant['id'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['email'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $etudiant['date_inscription'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.show', ['id' => $etudiant['id']]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Voir</a>
                                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                                                <button onclick="cancelValidation({{ $etudiant['id'] }})"
                                                    class="text-yellow-600 hover:text-yellow-900">Annuler
                                                    validation</button>
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
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
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

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('border-indigo-500', 'text-indigo-600'));
                    tab.classList.add('border-indigo-500', 'text-indigo-600');

                    contents.forEach(content => content.classList.add('hidden'));
                    document.getElementById(tab.getAttribute('aria-controls')).classList.remove('hidden');
                });
            });

            const searchInput = document.getElementById('search');
            const table = document.querySelector('table');
            const rows = table.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

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

            // Ici, vous devriez implémenter l'envoi réel de l'e-mail
            // Pour cet exemple, nous allons simplement afficher les détails dans la console
            console.log('Envoi d\'un e-mail à:', email);
            console.log('Objet:', subject);
            console.log('Message:', message);

            // Fermer la modal après l'envoi
            closeContactModal();

            // Afficher une confirmation
            alert('E-mail envoyé avec succès !');
        }

        function cancelValidation(userId) {
            if (confirm('Êtes-vous sûr de vouloir annuler la validation de cet utilisateur ?')) {
                // Ici, vous devriez implémenter la logique réelle d'annulation
                // Pour cet exemple, nous allons simplement afficher une action dans la console
                console.log('Annulation de la validation pour l\'utilisateur ID:', userId);

                // Afficher une confirmation
                alert('La validation a été annulée avec succès !');
            }
        }
    </script>
</x-app-layout>