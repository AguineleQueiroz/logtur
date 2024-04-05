<?php

namespace App\Livewire\Forms;

use App\Livewire\Client\ClientList;
use App\Models\PaymentList;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TravelEditPaymentsForm extends Form
{
    public ?PaymentList $passenger = null;
    /* form properties */
    public string $user_id = '';
    public string $passenger_id = '';
    public string $travel_id = '';
    public string $passenger_list_id = '';
    public string $name = '';
    public string $phone = '';
    public int $jan = 0;
    public int $fev = 0;
    public int $mar = 0;
    public int $abr = 0;
    public int $mai = 0;
    public int $jun = 0;
    public int $jul = 0;
    public int $ago = 0;
    public int $set = 0;
    public int $out = 0;
    public int $nov = 0;
    public int $dez = 0;

    /**
     * Saves data after form submission
     */
    public function save(): void {

        $resultAction = $this->passenger->update(
            $this->only(
                [
                    'user_id', 'passenger_id', 'travel_id', 'passenger_list_id', 'name', 'phone', 'jan', 'fev',
                    'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'
                ]
            )
        );

        $resultAction ? ClientList::dispatchNotification(color: 'white') : ClientList::dispatchNotification(false, color: 'white');

        $this->reset();
    }

    /**
     * Fill fields in edit modal
     *
     * @param PaymentList|null $passenger
     * @return void
     */
    public function setPayer(?PaymentList $passenger = null):void {
        $this->passenger = $passenger;
        $this->user_id =$passenger->user_id;
        $this->passenger_id = $passenger->passenger_id;
        $this->travel_id = $passenger->travel_id;
        $this->passenger_list_id = $passenger->passenger_list_id;
        $this->name = $passenger->name;
        $this->phone = $passenger->phone;
        $this->jan = $passenger->jan;
        $this->fev = $passenger->fev;
        $this->mar = $passenger->mar;
        $this->abr = $passenger->abr;
        $this->mai = $passenger->mai;
        $this->jun = $passenger->jun;
        $this->jul = $passenger->jul;
        $this->ago = $passenger->ago;
        $this->set = $passenger->set;
        $this->out = $passenger->out;
        $this->nov = $passenger->nov;
        $this->dez = $passenger->dez;
    }
}
