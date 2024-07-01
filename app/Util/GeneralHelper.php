<?php

namespace App\Util;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralHelper {
    /**
     * @param $p_Table
     * @return void
     */
    public static function truncateDataTable($p_Table): void {
        if (DB::table($p_Table)->count() > 0) {
            DB::table($p_Table)->truncate();
        }
        return;
    }

    /**
     * @param $birthdate
     * @return int
     */
    public static function calculateAge($birthdate): int
    {
        $birthDate = Carbon::createFromFormat('Y-m-d', $birthdate);
        $age = $birthDate->diffInYears(Carbon::now());
        return $age;
    }

    public static function getUserData()
    {
        $userData = [
            "id" => Auth::id(),
            "name" => Auth::user()->name,
            "phone" => "00000000000",
            "user_id" => Auth::id(),
            "identity" => "00000000"
        ];
        $jsonString = json_encode($userData);
        return response()->json($jsonString)->original;
    }

    public static function formatDate($datetime): string
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $datetime);
        $formattedDate = $date->translatedFormat('d \d\e F, Y');
        return $formattedDate;
    }
}
