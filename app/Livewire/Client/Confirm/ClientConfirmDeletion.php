<?php

namespace App\Livewire\Client\Confirm;

use App\Helpers\Helper;
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
        $client = Client::getClient($this->client_id);
        $list_id = $client->passengers_list_id;
        $resultClearRelationsAction = Helper::removePerson($list_id, $this->client_id);
        $resultAction = Client::find($this->client_id)->delete();

        if ($resultClearRelationsAction and $resultAction) {
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
