<?php

namespace App\Livewire\Forms;

use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Models\PassengersList;
use App\Models\Travel;
use App\Models\User;
use App\Util\GeneralHelper;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePassengerListForm extends Form
{
    public ?PassengersList $passenger_list = null;

    #[Rule('required')]
    public string|null $user_id;

    #[Rule('nullable')]
    public string|null $travel_id = null;

    #[Rule('required|min:5|max:45|unique:passengers_list,name')]
    public string $name = '';

    #[Rule('nullable')]
    public string $list = '{}';

    #[Rule('nullable')]
    public int $size = 0;
    /**
     * @throws ValidationException
     */
    public function saveNewList(): void
    {
        $this->user_id = User::getOwner();
        $this->name = str_replace('/', '', str_replace(' ','_', strtolower($this->name)));
        if(empty($this->passenger_list)) {
            $this->validate();
            $resultAction = PassengersList::create($this->only(['user_id', 'travel_id', 'name', 'list', 'size']));
            ClientList::dispatchNotification($resultAction, title: 'Lista criada comm sucesso.', color: 'white');
        }else{
            $this->validate();
            $resultAction = $this->passenger_list->update($this->only(['user_id', 'travel_id', 'name', 'list', 'size']));
            $resultAction ? ClientList::dispatchNotification(title: 'Lista atualizada.', color: 'white') : ClientList::dispatchNotification(false, color: 'white');
        }
        $this->reset();
    }

    /**
     * @return void
     */
    public static function createPassengersList(): void
    {
        $user_id = User::getOwner();
        $travel_id = session('travel_id_created');
        $travel = Travel::find($travel_id);
        $name = str_replace('/', '', str_replace(' ','_', strtolower($travel->destiny)));

        $list = PassengersList::create(['user_id' => $user_id, 'travel_id' => $travel_id, 'name' => $name, 'list' => "{}", 'size' => 0]);

        $travel->update(['passengers_list_id' => $list->id]);
        $list->update(['travel_id' => $travel->id]);

        session()->forget('travel_id_created');
    }

    /**
     * @param PassengerList|null $passengerList
     * @return void
     */
    public function setPassengerList(?PassengerList $passengerList = null):void {
        $this->passenger_list = $passengerList;
        $this->user_id = $passengerList->user_id;
        $this->travel_id = $passengerList->travel_id;
        $this->name = $passengerList->name;
        $this->list = $passengerList->list;
        $this->size = $passengerList->size;
    }
}
