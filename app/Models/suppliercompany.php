<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliercompany extends Model
{
    use HasFactory;



 protected $table = 'suppliercompanies';

 protected $fillable = [
         'companynameid',
         'price2',
         'multtota2',
         
 ];

 

}
