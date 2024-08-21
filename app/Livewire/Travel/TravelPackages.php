<?php

namespace App\Livewire\Travel;

use App\Models\Travel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TravelPackages extends Component
{
    use WithPagination;
    public int $perPage = 10;
    public string $search = '';
    /**
     * @return View
     */
    public function render():View
    {
        $travels = Travel::where('user_id', Auth::id())->Search($this->search)->paginate($this->perPage);
        foreach ($travels as $travel) {
            $this->updateStatus($travel);
        }
        return view('livewire.travel.travel-packages',[
            'travels' => $travels
        ]);
    }

    /**
     * Refresh travels packages page
     *
     * @return void
     */
    public static function refresh(): void {
        redirect('/travels', true);
    }

    private function updateStatus(&$travel) {
        $now = Carbon::now();
        $arrivalTravelDate = Carbon::parse($travel->arrival);
        $departureTravelDate = Carbon::parse($travel->departure);
        if($arrivalTravelDate->lt($now)) {
            $travel->update(['status' => 'accomplished']);
        } elseif($departureTravelDate->lt($now) and $arrivalTravelDate->gt($now)) {
            $travel->update(['status' => 'in progress']);
        }else{
            $travel->update(['status' => 'pending']);
        }
    }
}
