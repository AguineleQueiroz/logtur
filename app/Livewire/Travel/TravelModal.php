<?php

namespace App\Livewire\Travel;

use App\Livewire\Forms;
use App\Models\Travel;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class TravelModal extends ModalComponent
{

    public string $travel_id = '';
    public Forms\TravelForm $form;

    /**
     * @return View
     */
    public function render():View
    {
        return view('livewire.forms.travel-form');
    }

    /**
     * @return void
     */
    public function mount(): void {
        $travel = Travel::find($this->travel_id);
        if($travel){
            $this->form->setTravelData($travel);
        }
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function save(): void {
        $this->form->save();
        TravelPackages::refresh();
        $this->closeModal();
    }
}
