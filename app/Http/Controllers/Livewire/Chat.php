<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $message = '';
    public $messages = [
        ['user' => 'Utilisateur', 'content' => 'Bonjour, j\'aimerais en savoir plus sur les opportunités pour les HSP dans le secteur IT.'],
        ['user' => 'Support', 'content' => 'Bien sûr ! Il existe de nombreuses opportunités pour les HSP dans l\'IT, notamment dans les domaines de l\'UX design et de la gestion de projet...'],
    ];

    public function sendMessage()
    {
        if (!empty($this->message)) {
            $this->messages[] = ['user' => 'Utilisateur', 'content' => $this->message];
            $this->message = '';
        }
    }

    public function render()
    {
        return view('livewire.chat');
    }
}