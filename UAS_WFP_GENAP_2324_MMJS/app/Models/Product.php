<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function hotels(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'product_transaction', 'product_id', 'transaction_id');
    }

    public function tipeproduks(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class, 'tipeproduk_id');
    }

    public function fasiltas(): HasMany
    {
        return $this->hasMany(Fasilitas::class, 'product_id', 'id');
    }
}
