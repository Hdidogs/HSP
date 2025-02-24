<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de l\'étudiant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="md:col-span-1 bg-gray-50 p-6 rounded-lg shadow">
                            <div class="text-center">
                                <h2 class="text-xl font-semibold mb-2">
                                    {{ $user['prenom'] }} {{ $user['nom'] }}
                                </h2>
                                @if($etudiant)
                                    <p class="text-gray-600">{{ $etudiant['etude'] }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="md:col-span-2 bg-white p-6 rounded-lg shadow">
                            <h3 class="text-xl font-semibold mb-4">CV</h3>
                            <div class="h-[calc(100vh-400px)] overflow-y-auto border rounded-lg">
                                @if(\Illuminate\Support\Str::endsWith($etudiant['cv'], '.pdf'))
                                    <iframe src="{{ Storage::url($etudiant['cv']) }}"
                                            class="w-full h-full" frameborder="0"></iframe>
                                @else
                                    <img src="{{ Storage::url($etudiant['cv']) }}"
                                         alt="CV de {{ $user['prenom'] }} {{ $user['nom'] }}"
                                         class="w-full h-auto">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <a href="{{ route('admin.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Retour à la liste
                        </a>
                        <button onclick="confirmerAction('accepter', {{ $user['id'] }})"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            Accepter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmerAction(action, userId) {
            if (action === 'accepter') {
                Swal.fire({
                    title: 'Confirmer l\'acceptation',
                    text: "Voulez-vous vraiment accepter cet étudiant ?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Oui, accepter !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Accepté !',
                            text: 'L\'étudiant a été accepté avec succès.',
                            icon: 'success',
                            confirmButtonColor: '#10B981'
                        });
                        window.location.href = "../../../user/validate/" + userId;
                    }
                });
            }
        }
    </script>
</x-app-layout>
