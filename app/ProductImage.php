<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $primaryKey = 'product_image_id';

    //
    protected $fillable = ['product_image_path'];

    //many to one relationship
    public function product(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
