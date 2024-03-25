<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    
 protected $table = 'products';
    
 protected $fillable = [
         'product_id',
         'product_no',
         'product_name',
         'sell_price',
         'cprice',
         'quantity',
         'unit',
         'min_stock',
         'expire_date',
         'remarks',
                     
 ];
 
}

