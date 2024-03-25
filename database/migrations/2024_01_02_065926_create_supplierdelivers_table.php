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
        Schema::create('supplierdelivers', function (Blueprint $table) {
            $table->bigIncrements('sid');
            $table->string('name')->nullable()->default(null);
            $table->decimal('quantity',65 ,5)->nullable()->default(null);
            $table->decimal('price',65 ,5)->nullable()->default(null);
            $table->decimal('multtota',65 ,5)->nullable()->default(null);
            $table->string('unit')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->integer('supplierid')->nullable()->default(null);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplierdelivers');
    }
};
