<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouses extends Model
{
    use HasFactory;

 protected $table = 'warehouses';
    
 protected $fillable = [
         'supplier_id',
         'name',
         'quantity',
         'price',
         'multtotal',
         'unit',
         'description',
         'expire_date',
         'picture',
         'create_date',            
 ];

 protected $primaryKey = "sid";

 //public function products(){

   // return $this->hasOne(products::class, 'product_id', 'sid' );
 //return $this->hasOne('App\Models\products');
//}
 
}