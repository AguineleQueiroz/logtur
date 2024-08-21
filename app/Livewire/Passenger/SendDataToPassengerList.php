<?php

namespace App\Livewire\Passenger;

use App\Livewire\Client\ClientList;
use App\Livewire\Travel\TravelPaymentDetails;
use App\Models\PassengersList;
use App\Models\Travel;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class SendDataToPassengerList extends Component
{
    public string $list_id = '';

    #[On('list-exists')]
    public function render():View
    {
        $lists = PassengersList::getListByUserId();
        return view('livewire.passenger.send-data-to-passenger-list', [
            'lists' => $lists,
        ]);
    }

    /**
     * @param $arr
     * @return mixed
     */
    public function sortByName($arr): mixed
    {
        usort($arr, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        return $arr;
    }

    /**
     * @param $arr
     * @return array
     */
    public function restrictArraysByKeys($arr): array
    {
        return array_map(function ($passenger) {
            return [
                'id' => $passenger['id'],
                'user_id' => $passenger['user_id'],
                'name' => $passenger['name'],
                'identity' => $passenger['identity'],
                'phone' => $passenger['phone'],
            ];
        }, $arr);
    }

    /**
     * @param $array
     * @param $key
     * @return array
     */
    public function uniqueMultiDimArray($array, $key): array
    {
        $temp_array = array();
        $index = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$index] = $val[$key];
                $temp_array[$index] = $val;
            }
            $index++;
        }
        return $temp_array;
    }

    /**
     * @return void
     */
    public function closeModal(): void
    {
        $this->dispatch('closeModal');
    }

    /**
     * @throws ValidationException
     */
    public function save(): void {
        $selectedList = $this->list_id ? PassengersList::find($this->list_id) : null;
        $travel = Travel::where('passengers_list_id', $this->list_id);
        if (!$selectedList) {
            ClientList::dispatchNotification(title: 'Selecione uma lista para adicionar os passageiros selecionados.', color: 'white');
        }elseif (session()->exists('selected_clients')) {
            $clients_selected = session('selected_clients');
            /*list: format array*/
            $passenger_list_db = json_decode($selectedList->list, true);
            $passengers_marked = self::restrictArraysByKeys($clients_selected);

            if(session()->exists('restrict_data_passengers')) {
                session()->forget('restrict_data_passengers');
                session()->forget('passenger_list_id');
                session()->forget('travel_id');
            }
            session()->put(['restrict_data_passengers' => $passengers_marked]);
            session()->put(['passenger_list_id' => $this->list_id]);
            session()->put(['travel_id' => $selectedList->travel_id]);

            if(count($passenger_list_db) != 0) {
                $passenger_list_db = array_merge($passengers_marked, $passenger_list_db);
            }else{
                $passenger_list_db = $passengers_marked;
            }

            /*remove values nom uniques*/
            $passenger_list_db = self::uniqueMultiDimArray($passenger_list_db, 'id');
            $size = count($passenger_list_db);
            $passenger_list_db = self::sortByName($passenger_list_db);

            /*convert final list in json format and update data on db*/
            $resultAction = $selectedList->update(['list' => json_encode($passenger_list_db), 'size' => $size]);
            $travel->update(['occupied_vacancies' => $size]);
            if($resultAction) {
                TravelPaymentDetails::addOnPaymentList();
                ClientList::dispatchNotification($resultAction, title: 'Lista preenchida com sucesso.', color: 'white');
            }else {
                ClientList::dispatchNotification(false, title: 'Lista não pode ser preenchida. Tente novamente!', color: 'white');
            }

            session()->forget('selected_clients');
            $this->reset();
            $this->closeModal();
            ClientList::refresh();

        }else{
            ClientList::dispatchNotification(title: 'Selecione os passageiros para esta viagem.', color: 'white');
        }
    }
}
