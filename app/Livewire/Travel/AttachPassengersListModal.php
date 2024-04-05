<?php

namespace App\Livewire\Travel;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AttachPassengersListModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.travel.attach-passengers-list-modal');
    }
}
