<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'has_permission';

    /**
     * Get permission ID by user id provided
     *
     * @param int $id
     * @return mixed
     */
    public static function getUserPermission(int $id ): mixed
    {
        return self::select('permission_id')->where('user_id', $id)->first();
    }
}
