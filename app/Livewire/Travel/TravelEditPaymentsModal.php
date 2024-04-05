<?php

namespace App\Livewire\Travel;

use App\Livewire\Forms;
use App\Models\PaymentList;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class TravelEditPaymentsModal extends ModalComponent
{
    public Forms\TravelEditPaymentsForm $form;
    public string $passenger_id = '';
    public string $passenger_list = '';

    public function render():View
    {
        $passenger = json_decode(json_encode($this->form->all()), true)["passenger"];
        return view('livewire.forms.travel-edit-payments-form',['passenger' => $passenger]);
    }

    /**
     * @return void
     */
    public function mount(): void {
        $passenger = PaymentList::where('user_id', Auth::user()->id)->where('id', $this->passenger_id)->first();
        if($passenger) {
            $this->passenger_list = $passenger;
            $this->form->setPayer($passenger);
        }
    }


    /**
     * @return void
     */
    public function save():void {
        $this->form->save();
        $this->closeModal();
        TravelPaymentDetails::refresh($this->passenger_list);
    }
}
