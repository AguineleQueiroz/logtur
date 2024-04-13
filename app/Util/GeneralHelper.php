<?php

namespace App\Util;
use App\Models\UserType;
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
}
