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
        return view('livewire.travel.travel-packages',[
            'travels' => Travel::where('user_id', Auth::id())->Search($this->search)->paginate($this->perPage)
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
