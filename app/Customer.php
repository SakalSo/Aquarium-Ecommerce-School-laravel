<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //primary key
    protected $primaryKey = 'customer_id';

    //
    protected $fillable = [
        'point'
    ];

    //one to one relationship
    public function user(){
        return $this->hasOne(User::class,'user_id','user_id');
    }
}
