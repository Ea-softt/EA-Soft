<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
      
     protected $fillable = [
         'FullName','DOB','Age','Gender','Language','Hometown'
         ,'Nationality','Religion','Lastschool','Qualification'
         ,'Phonenum','Mail','Address','Address2','Department'
         ,'StartingDate','Status','Employer','avatar'

     ];

}
