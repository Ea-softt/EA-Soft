<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class suppliers extends Model
{
    use HasFactory;
         protected $table = 'suppliers';

    protected $fillable = [
        'CompanyName','FullName','Address','Phonenumber'

    ];


   /* public function paymentid(){
        return this-hasMany('App\Models\cashtypee'
, 'suppliername', 'id');*/
    //}
}
