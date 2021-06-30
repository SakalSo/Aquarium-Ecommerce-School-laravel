<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'order_id';

    //one to many relationship
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_detail_id', 'order_detail_id');
    }

    //one to one relationship
    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','invoice_id');
    }

    //one to one relationship
    public function shoppingCart(){
        return $this->hasOne(ShoppingCart::class,'shopping_card_id','shopping_card_id');
    }
}
