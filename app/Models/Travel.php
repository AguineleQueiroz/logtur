<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Travel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'travels';
    protected $fillable = [
        'photo',
        'user_id',
        'passengers_list_id',
        'name',
        'departure',
        'arrival',
        'description',
        'payment_method1',
        'payment_method2',
    ];

    /**
     * @return BelongsTo
     */
    public static function user(): BelongsTo
    {
        return (new Travel)->belongsTo(User::class);
    }


    /**
     * @return mixed
     */
    public static function getListByUserId(): mixed
    {
        return self::where('user_id', Auth::user()->id)->get();
    }
}
