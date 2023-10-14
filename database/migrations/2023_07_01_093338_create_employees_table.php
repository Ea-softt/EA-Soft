<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('FullName'); 
            $table->string('DOB');
            $table->string('Age');
            $table->string('Gender');          
            $table->string('Language'); 
            $table->string('Hometown');  
            $table->string('Nationality');
            $table->string('Religion');
            $table->string('Lastschool');
            $table->string('Qualification'); 
            $table->string('Phonenum');
            $table->string('Mail');
            $table->string('Address');
            $table->string('Address2');   
            $table->string('Department');
            $table->string('StartingDate');
            $table->string('Status');  
            $table->string('Employer');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
