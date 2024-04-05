<?php

namespace App\Livewire\Travel;

use App\Livewire\Client\ClientList;
use App\Models\PassengersList;
use App\Models\PaymentList;
use App\Models\Travel;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

class AttachPassengerList extends Component
{
    public string $list_selected = '';
    public string $travel_selected = '';

    public function render(): View
    {
        $lists = PassengersList::getListByUserId();
        $packages = Travel::getListByUserId();
        return view('livewire.travel.attach-passenger-list', [
            'lists' => $lists,
            'packages' => $packages
        ]);
    }

    /**
     * @return void
     */
    public function closeModal(): void
    {
        $this->reset();
        $this->dispatch('closeModal');
    }

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        /* attach list selected/created in your travel package */
        $travel = Travel::find($this->travel_selected);
        if($this->list_selected and $this->travel_selected and $travel){
            $list = PassengersList::find($this->list_selected);

            $resultAction = $travel->update(['passengers_list_id' => $this->list_selected]);
            $resultActionListUpdate = $list->update(['travel_id' => $travel->id]);

            if(!$resultAction){
                ClientList::dispatchNotification(false,
                    title: 'Não foi possível anexar a lista ao pacote selecionado. Verifique e tente novamente!', color: 'white');
            }
            if(!$resultActionListUpdate){
                ClientList::dispatchNotification(false,
                    title: 'Não foi possível anexar pacote a lista!', color: 'white');
            }
            ClientList::dispatchNotification($resultAction, title: 'Lista anexada com sucesso.', color: 'white');
            $this->reset();
            $this->closeModal();
            TravelPackages::refresh();
        }else{
            ClientList::dispatchNotification(title: 'Selecione uma lista ou pacote para anexar.', color: 'white');
        }
    }
}
