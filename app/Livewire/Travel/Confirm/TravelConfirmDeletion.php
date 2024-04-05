<?php

namespace App\Livewire\Travel\Confirm;

use App\Livewire\Client\ClientList;
use App\Livewire\Travel\TravelPackages;
use App\Models\Travel;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class TravelConfirmDeletion extends ModalComponent
{
    public $travel_id;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.travel.confirm.travel-confirm-deletion');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $resultAction = Travel::find($this->travel_id)->delete();
        if ($resultAction) {
            ClientList::dispatchNotification(
                $resultAction,
                'Cliente excluído',
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
        TravelPackages::refresh();
    }

}
