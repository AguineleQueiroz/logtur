<?php

namespace App\Livewire\Passenger\Confirm;

use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Models\PassengersList;
use LivewireUI\Modal\ModalComponent;

class ListConfirmDeletion extends ModalComponent
{
    public string $list_id;

    public function render()
    {
        return view('livewire.passenger.confirm.list-confirm-deletion');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $resultAction = PassengersList::find($this->list_id)->delete();
        if ($resultAction) {
            ClientList::dispatchNotification(
                $resultAction,
                'Lista Excluída',
                'white'
            );
        } else {
            ClientList::dispatchNotification(
                $resultAction,
                'Ops! Algo deu errado.',
                'white'
            );
        }
        $this->closeModal();
        PassengerList::refresh();
    }
}
