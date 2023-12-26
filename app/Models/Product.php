<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\User;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable = [
        'scientific_name',
        'commercial_name',
        'manufacturer',
        'img_path',
        'price',
        'quantity',
        'expiration_date',
        'category_id',
        'user_id',
    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function  user()
    {
        return $this->belongTo(User::class, 'user_id');
    }
    /*public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }*/
    public function orders()
{
  return $this->belongsToMany(Order::class,'order_product','product_id','order_id','id','id');
}

}
