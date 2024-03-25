<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class updatewarehouse extends Model
{
    use HasFactory;

protected $table = 'updatewarehouses';
    
 protected $fillable = [
        'product_id',
        'productname',
        'quantity',
        'price',
        'tprice',
        'companyname',
        'unity',
        'expiredate',
        'description',
        'images',
          
 ];
 public function suppliersid(){
        return $this->hasOne('App\Models\suppliers', 'id', 'product_id');
    }
}
