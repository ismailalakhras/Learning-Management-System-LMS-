<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ['user_id'];

    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

