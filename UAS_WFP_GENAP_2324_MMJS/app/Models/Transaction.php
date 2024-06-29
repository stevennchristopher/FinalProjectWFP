<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_transaction', 'transaction_id', 'product_id')->withPivot('quantity','subtotal');
    }

    public function insertProducts($cart)
    {
        foreach ($cart as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $this->products()->attach($item['id'], [
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal
            ]);
        }
    }
}
