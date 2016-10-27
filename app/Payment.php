<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['merchant_id','amount','order_id','first_name','last_name','pincode','phone','paid'];
}
