<?php

namespace App\Livewire\Forms;

use App\Livewire\Client\ClientList;
use App\Models\PassengersList;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditListForm extends Form
{
    public ?PassengersList $list = null;

    #[Rule('required|string')]
    public string $user_id = '';

    #[Rule('required|min:5|max:45|unique:passengers_list,name')]
    public string $name = '';

    #[Rule('nullable')]
    public string $list_db = '';

    #[Rule('nullable')]
    public int $size = 0;
    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->name = str_replace(' ','_', strtolower($this->name));
        $this->validate([
            'name' => 'required|min:5|max:45'
        ]);
        $resultAction = $this->list->update(['name' => $this->name]);
        $resultAction ? ClientList::dispatchNotification(title: 'Nome da lista atualizado.', color: 'white') : ClientList::dispatchNotification(false, color: 'white');
        $travel = Travel::where('passengers_list_id', $this->list->id);
        $travel->update(['destiny' => ucwords(str_replace('_',' ', $this->name))]);
        $this->reset();
    }

    /**
     * Fill fields in edit list modal
     *
     * @param PassengersList|null $list
     * @return void
     */
    public function setList(?PassengersList $list = null):void {
        $this->list = $list;
        $this->user_id =$list->user_id;
        $this->name = str_replace('_', ' ', $list->name);
        $this->list_db =$list->list;
        $this->size =$list->size;
    }
}
