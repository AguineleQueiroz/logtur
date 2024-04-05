<?php

namespace App\Livewire\Passenger;

use App\Models\PassengersList;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PassengerList extends Component
{
    use WithPagination;
    public int $perPage = 5;
    public string $search = '';

    public function render():View
    {
        /* User::find(Auth::user()->id)->passengersLists; */
        return view('livewire.passenger.passenger-list',
            ['lists' => PassengersList::where('user_id', Auth::user()->id)->search($this->search)->paginate($this->perPage)]
        );
    }

    /**
     * Refresh lists page
     *
     * @return void
     */
    public static function refresh(): void {
        redirect('/lists', true);
    }
}
