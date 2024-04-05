<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'payment_list';
    protected $fillable = [
        'user_id',
        'passenger_id',
        'travel_id',
        'passenger_list_id',
        'name',
        'phone',
        'jan',
        'fev',
        'mar',
        'abr',
        'mai',
        'jun',
        'jul',
        'ago',
        'set',
        'out',
        'nov',
        'dez',
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
}
