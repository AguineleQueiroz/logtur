<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class PassengersList extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'passengers_list';
    protected $fillable = [
        'user_id',
        'travel_id',
        'name',
        'list',
        'size'
    ];

    /**
     * @param $query
     * @param $value
     * @return void
     */
    public function scopeSearch($query, $value): void
    {
        $query->where('name', 'like', "%{$value}%");
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    /**
     * @return mixed
     */
    public static function getListByUserId(): mixed
    {
        return self::where('user_id', Auth::user()->id)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function size($id): mixed
    {
        return (self::find($id)->first())->size;
    }
}
