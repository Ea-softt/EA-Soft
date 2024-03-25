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
            $table->string('FullName')->nullable()->default(null); 
            $table->string('DOB')->nullable()->default(null);
            $table->string('Age')->nullable()->default(null);
            $table->string('Gender')->nullable()->default(null);         
            $table->string('Language')->nullable()->default(null);
            $table->string('Hometown')->nullable()->default(null); 
            $table->string('Nationality')->nullable()->default(null);
            $table->string('Religion')->nullable()->default(null);
            $table->string('Lastschool')->nullable()->default(null);
            $table->string('Qualification')->nullable()->default(null);
            $table->string('Phonenum')->nullable()->default(null);
            $table->string('Mail')->nullable()->default(null);
            $table->string('Address')->nullable()->default(null);
            $table->string('Address2')->nullable()->default(null);  
            $table->string('Department')->nullable()->default(null);
            $table->string('StartingDate')->nullable()->default(null);
            $table->string('Status')->nullable()->default(null); 
            $table->string('Employer')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
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
