<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'shipping_address',
        'total_cost'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
