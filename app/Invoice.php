<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $primaryKey = 'invoice_id';

    //
    protected $fillable = [
        'total_cost',
        'total_price',
        'delivery_price',
        'sale_tax',
        'grand_total',
    ];

    //many to one relationship
    public function saleReport(){
        return $this->belongsTo(SaleReport::class,'sale_report_id','sale_report_id');
    }

    //one to one relationship()
    public function order(){
        return $this->hasOne(Order::class, 'invoice_id', 'invoice_id');
    }
}
