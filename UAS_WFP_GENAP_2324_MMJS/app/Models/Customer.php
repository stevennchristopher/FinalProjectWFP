<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'id');
    }

    public function memberships(): HasOne
    {
        return $this->hasOne(Membership::class, 'customer_id', 'id');
    }
}
