<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeProduct extends Model
{
    use HasFactory;

    public function products(): HasMany
    {
        return $this->belongsTo(Product::class, 'type_id','id');
    }
}

