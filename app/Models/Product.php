<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','image','description','price','discount','average_rate','category_id','brand_id',
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function WishedProduct()
    {
    return $this->hasOne(UserProduct::class);
    }
    }
