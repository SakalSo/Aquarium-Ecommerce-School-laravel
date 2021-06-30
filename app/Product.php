<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'product_id';

    //
    protected $fillable = [
        'product_name', 'sku', 'cost', 'price', 'image'
    ];


    //many to one relationship
    public function Category(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    //get table column name
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
