<?php

namespace App\Livewire\Passenger\Confirm;

use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Models\Client;
use App\Models\PassengersList;
use App\Models\PaymentList;
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
        $list = PassengersList::find($this->list);
        $passengers = json_decode($list->list, true);
        $wanted_passenger = $this->passenger;

        $passengers = array_filter($passengers, function ($passenger) use ($wanted_passenger) {
            return $passenger['id'] !== $wanted_passenger;
        });

        /*adding new indexies to arrays*/
        $passengers = array_values($passengers);

        /* update size list */
        $size = $list->size - 1;
        $resultAction = $list->update(['list' => json_encode($passengers), 'size' => $size]);
        /* update payment list */
        $passenger = PaymentList::where('passenger_id', $wanted_passenger)->first();
        if($passenger) {
            $passenger->delete();
        }
        if ($resultAction) {
            ClientList::dispatchNotification(
                $resultAction,
                'Passageiro removido da lista',
                'white'
            );
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
