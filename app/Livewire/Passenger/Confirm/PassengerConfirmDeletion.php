<?php

namespace App\Livewire\Passenger\Confirm;

use App\Helpers\Helper;
use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Models\Client;
use App\Models\PassengersList;
use App\Models\PaymentList;
use App\Models\Travel;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class PassengerConfirmDeletion extends ModalComponent
{
    public string $passenger;
    public string $list;

    public function render():View
    {
        return view('livewire.passenger.confirm.passenger-confirm-deletion');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $resultAction = Helper::removePerson($this->list, $this->passenger);
        if ($resultAction) {
            ClientList::dispatchNotification(
                $resultAction,
                'Passageiro removido da lista',
                'white'
            );
            $client = Client::getClient($this->passenger);
            $client->update(['passengers_list_id' => null]);
        } else {
            ClientList::dispatchNotification(
                $resultAction,
                'Ops! Algo deu errado.',
                'white'
            );
        }
        PassengerList::refresh();
        $this->closeModal();
    }

    /**
     * @return bool
     */
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public static function destroyOnClose(): bool
    {
        return true;
    }
}
