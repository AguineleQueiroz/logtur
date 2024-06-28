<?php

namespace App\Helpers;

use App\Models\PassengersList;
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
    public static function convertDate($date) {
        return Carbon::parse($date)->format("d \\d\\e M");
    }
}
