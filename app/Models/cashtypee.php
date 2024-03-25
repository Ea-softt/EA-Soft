<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cashtypee extends Model
{
    use HasFactory;

 protected $table = 'cashtypees';
    
 protected $fillable = [ 
                 'suppliername',
                 'batchno',
                 'currentpayment',
                 'suppliercurentbilling',
                 'amountpaid',
                 'amountpayable',
                 'remark',

                ];


    public function suppliersid(){
        return $this->hasOne('App\Models\suppliers', 'id', 'suppliername');
    }
}
