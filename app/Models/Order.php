<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'pharmacist_id',
        'store_id',
    ];
   /* public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }*/
    public function pharmacist()
    {
        return $this->belongsTo(User::class, 'pharmacist_id');
    }
    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
    public function products()
{
  return $this->belongsToMany(Product::class,'order_product','order_id','product_id','id','id');
}
}
