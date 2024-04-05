<?php

namespace App\Helpers;

use App\Models\PassengersList;

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
}
