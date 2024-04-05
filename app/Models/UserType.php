<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'usertypes';
    protected $fillable = [
        'type'
    ];

    /**
     * Get Permission Name by ID provided
     *
     * @param int $id
     * @return mixed
     */
    public static function getPermissionName(int $id): mixed
    {
        return self::select('type')->where('id', $id)->first();
    }
}
