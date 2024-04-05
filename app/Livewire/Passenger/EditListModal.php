<?php

namespace App\Livewire\Passenger;

use App\Livewire\Forms;
use App\Models\PassengersList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class EditListModal extends ModalComponent
{
    public string $list_id = '';
    public Forms\EditListForm $form;

    public function render(): View
    {
        return view('livewire.forms.edit-list-form');
    }

    /**
     * @return void
     */
    public function mount(): void
    {
        $list = PassengersList::where('user_id', Auth::user()->id)->where('id', $this->list_id)->first();
        if($list) {
            $this->form->setList($list);
        }
    }

    /**
     * @throws ValidationException
     */
    public function save():void {
        $this->form->save();
        $this->closeModal();
        PassengerList::refresh();
    }
}
