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
        'user_id',
        'passengers_list_id',
        'destiny',
        'departure',
        'arrival',
        'status',
        'price',
        'occupied_vacancies',
        'available_vacancies',
    ];

    public function scopeSearch($query, $value) {
        $query->where('destiny', 'like', "%{$value}%")
            ->orWhere('status', 'like', "%{$value}%");
    }

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

    /**
     * @return mixed
     */
    public static function getTravelByListId($id): mixed
    {
        return self::where('passengers_list_id', $id)->first();
    }
}
