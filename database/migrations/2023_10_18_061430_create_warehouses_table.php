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
        Schema::create('warehouses', function (Blueprint $table) {
           $table->bigIncrements('sid');
            $table->integer('supplier_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->decimal('quantity',65 ,5)->nullable()->default(null);
            $table->decimal('price',65 ,5)->nullable()->default(null);
            $table->string('multtotal')->nullable()->default(null);
            $table->string('unit')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('expire_date')->nullable()->default(null);
            $table->string('picture')->nullable()->default(null);
            $table->timestamp('create_date')->nullable()->default(null); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
