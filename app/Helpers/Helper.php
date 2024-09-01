<?php

namespace App\Helpers;

use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Models\PassengersList;
use App\Models\PaymentList;
use App\Models\Travel;
use Carbon\Carbon;

class Helper
{
    /**
     * @param string|null $list_id
     * @return ?int
     */
    public static function countPassengersInPackage(string|null $list_id): ?int
    {
        if($list_id){
            return PassengersList::find($list_id)->size;
        }
        return null;
    }
    public static function convertDate($date): string
    {
        Carbon::setLocale('pt_BR');
        return Carbon::parse($date)->translatedFormat("d \\d\\e M");
    }

    public static function getMonthAndYear($date): string
    {
        Carbon::setLocale('pt_BR');
        return ucfirst(Carbon::parse($date)->translatedFormat("M/Y"));
    }

    public static function removePerson($list_id, $wanted_passenger) {
        $list = PassengersList::find($list_id);
        $passengers = json_decode($list->list, true);

        $passengers = array_filter($passengers, function ($passenger) use ($wanted_passenger) {
            return $passenger['id'] !== $wanted_passenger;
        });

        /*adding new indexies to arrays*/
        $passengers = array_values($passengers);

        /* update size list */
        $size = $list->size - 1;
        $resultAction = $list->update(['list' => json_encode($passengers), 'size' => $size]);
        /* update payment list */
        $passenger = PaymentList::where('passenger_id', $wanted_passenger)->first();
        if($passenger) {
            $passenger->delete();
        }
        if ($resultAction) {
            $travel = Travel::getTravelByListId($list->id);
            if($travel) {
                $travel->update(['occupied_vacancies' => $size]);
            }
            return true;
        } else {
            return false;
        }

    }
}
