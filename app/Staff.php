<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staffs';
    
    //
    protected $primaryKey = 'staff_id';

    //
    protected $guarded =[
        'is_admin'
    ];

    //one to one relationship
    public function user(){
        return $this->hasOne(User::class,'user_id','user_id');
    }
}
