<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'clients';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'identity',
        'age',
        'address',
        'city',
        'phone'
    ];

    public function scopeSearch($query, $value) {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%")
            ->orWhere('address', 'like', "%{$value}%")
            ->orWhere('city', 'like', "%{$value}%");
    }

    public static function validateIdentity($attribute, $value, $fail) {
        $numeric_value = preg_replace('/[^0-9]/', '', $value);
        if (count(array_unique(str_split($numeric_value))) === 1) {
            $fail($attribute.' invalid.');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getClient($id) {
        return Client::where('id', $id)->first();
    }

    /**
     * @return BelongsTo
     */
    public static function user(): BelongsTo
    {
        return (new Client)->belongsTo(User::class);
    }

}
