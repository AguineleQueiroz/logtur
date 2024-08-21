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
}
