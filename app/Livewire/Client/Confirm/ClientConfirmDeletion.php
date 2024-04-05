<?php

namespace App\Livewire\Client\Confirm;

use App\Livewire\Client\ClientList;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class ClientConfirmDeletion extends ModalComponent
{
    public $client_id;

    /**
     * @return View
     */
    public function render():View
    {
        return view('livewire.client.confirm.client-confirm-deletion');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $resultAction = Client::find($this->client_id)->delete();
        if ($resultAction) {
            ClientList::dispatchNotification(
                $resultAction,
                'Cliente excluído',
                'white'
            );
        }else {
            ClientList::dispatchNotification(
                $resultAction,
                'Ops! Algo deu errado.',
                'white'
            );
        }
        $this->closeModal();
        ClientList::refresh();
    }
}
