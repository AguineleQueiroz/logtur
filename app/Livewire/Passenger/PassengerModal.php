<?php

namespace App\Livewire\Passenger;

use App\Livewire\Forms;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class PassengerModal extends ModalComponent
{
    public Forms\CreatePassengerListForm $form;

    /**
     * @return View
     */
    public function render():View
    {
        return view('livewire.passenger.passenger-modal' );
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function saveNewList(): void
    {
        $this->form->saveNewList();
        $this->dispatch('list-exists');
    }

    /**
     * @return void
     */
    #[On('closeModal')]
    public function clearSession(): void
    {
        session()->forget([
            'restrict_data_passengers', 'passenger_list_id', 'travel_id', 'selected_clients'
        ]);
    }

}
