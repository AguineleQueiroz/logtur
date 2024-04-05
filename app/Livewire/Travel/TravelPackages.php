<?php

namespace App\Livewire\Travel;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class TravelPackages extends Component
{
    /**
     * @return View
     */
    public function render():View
    {
        $tempData = User::find(Auth::user()->id)->travels;
        /*Travel::where('user_id', Auth::user()->id)->get();*/
        foreach ($tempData as $travel){
            $travel->departure = (Carbon::parse($travel->departure))->format("d \\d\\e M");
            $travel->arrival = (Carbon::parse($travel->arrival))->format("d \\d\\e M");
        }
        return view('livewire.travel.travel-packages',[
            'travels' => $tempData
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
}
