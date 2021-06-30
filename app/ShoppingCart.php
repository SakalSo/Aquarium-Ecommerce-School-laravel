<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $primaryKey = 'shopping_cart_id';

    //one to one relationship
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id', 'customer_id');
    }

    //one to one relationship
    public function order(){
        return $this->belongsTo(Order::class,'order_id','order_id');
    }
}
