<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplierdeliver extends Model
{
    use HasFactory;

    protected $table = 'supplierdelivers';
    
 protected $fillable = [
         'name',
         'quantity',
         'price',
         'multtota',
         'unit',
         'description',
                   
 ];

 protected $primaryKey = "sid";
}
