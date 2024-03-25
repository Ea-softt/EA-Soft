<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newstock extends Model
{
    use HasFactory;

    
 protected $table = 'newstocks';
    
 protected $fillable = [
        'productID','product_no','product_name','sell_price','cprice','quantity','unit','min_stocks','remarks','supplier_id','images','date_create','tcost'            
 ];


 public function suppliersid(){
        return $this->hasOne('App\Models\suppliers', 'id', 'supplier_id');
    }

}
