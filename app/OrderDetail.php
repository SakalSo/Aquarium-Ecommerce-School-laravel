<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $primaryKey = 'order_detail_id';

    //
    protected $fillable = ['quantity'];

    //one to many relationship
    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'product_id');
    }

    //many to one relationship
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
