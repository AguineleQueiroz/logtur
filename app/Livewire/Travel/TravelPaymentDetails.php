<?php

namespace App\Livewire\Travel;

use App\Livewire\Client\ClientList;
use App\Models\Client;
use App\Models\PaymentList;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

class TravelPaymentDetails extends Component
{
    public string $search = '';
    public function render(Request $request):View
    {
        $travel = '';
        if(isset($request->all()['travel'])){
            session()->put(['travel_payers_list_id' => $request->all()['travel']]);
        }
        if (session()->exists('travel_payers_list_id')){
            $travel = session('travel_payers_list_id');
        }

        if($travel) {

            $travel_model = Travel::find($travel);
            $list = $travel_model ? $travel_model->passengers_list_id : null;

            if($list) {
                $payments = PaymentList::where('travel_id', $travel)
                    ->where('passenger_list_id', $list)->search($this->search)->get();

                return view('livewire.travel.travel-payment-details', ['passengers' => $payments->toArray()]);
            }
        }
        return view('livewire.travel.travel-payment-details');
    }

    /**
     * @return void
     */
    public static function addOnPaymentList(): void
    {
        $data = session('restrict_data_passengers');
        $travel_id = session('travel_id');
        $passenger_list_id = session('passenger_list_id');
        $resultAction = false;
        foreach ($data as $passenger) {
            $exists = PaymentList::where('passenger_id', $passenger['id'])->first() ?? null;
            if(!$exists) {
                $resultAction = PaymentList::create([
                    'user_id' => $passenger['user_id'],
                    'passenger_id' => $passenger['id'],
                    'passenger_list_id' => $passenger_list_id,
                    'travel_id' => $travel_id,
                    'name' => $passenger['name'],
                    'phone' => $passenger['phone']
                ]);
                $client = Client::getClient($passenger['id']);
                $client->update(['passengers_list_id' => $passenger_list_id]);
            }
        }
        if($resultAction) {
            ClientList::dispatchNotification($resultAction, title: 'Lista preenchida com sucesso.', color: 'white');
        }else {
            ClientList::dispatchNotification(false, title: 'Não foi possível adicionar, pois o viajante já está na lista.', color: 'white');
        }
    }


    /**
     * Refresh payment list page
     *
     * @param string $payment_list_details
     * @return void
     */
    public static function refresh(string $payment_list_details): void {
        $list = json_decode($payment_list_details, true);
        session()->forget('selected_clients');
        redirect('/travel/payment-details?travel='.$list['travel_id'], true);
    }

}
