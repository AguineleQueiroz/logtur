<?php

namespace App\Livewire\Client;

use App\Livewire\Forms;

use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class ClientModal extends ModalComponent
{
    public string $client_id = '';
    public Forms\ClientForm $form;

    /**
     * @return View
     */
    public function render():View
    {
        return view('livewire.forms.client-form');
    }

    /**
     * @return void
     */
    public function mount(): void {
        $client = Client::where('user_id', Auth::id())->where('id', $this->client_id)->first();
        if($client) {
            $this->form->setClient($client);
        }
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function save():void {
        $this->form->save();
        $this->closeModal();
        ClientList::refresh();
    }
}
