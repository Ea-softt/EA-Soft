<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_product extends Model
{
    use HasFactory;


 protected $table = 'sales_products';
    
 protected $fillable = [
        'reciept_no',
        'product_id',
        'price',
        'ccprice',
        'qty',
        'created_date'                     
 ];
 
 public function productid(){
        return $this->hasOne('App\Models\products', 'id', 'product_id');
    }


}
