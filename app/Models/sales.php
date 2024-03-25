<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class sales extends Model
{
    use HasFactory;


 protected $table = 'sales';

 protected $fillable = [
         'customer_id',
         'username',
         'discount',
         'total',
         'grandtotal',
         'days',
         'month',
         'year',
         'typeofcash',
         'created_date',
 ];

 protected $primaryKey = "reciept_no";
}
