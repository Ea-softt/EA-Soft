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
        Schema::create('sales_products', function (Blueprint $table) {
            $table->id();
             $table->Integer('reciept_no')->nullable()->default(null);
              $table->string('product_id')->nullable()->default(null);
               $table->decimal('price',65 ,5)->nullable()->default(null);
                $table->decimal('ccprice',65 ,5)->nullable()->default(null);
                 $table->decimal('qty',65 ,5)->nullable()->default(null);
                 $table->string('created_date')->nullable()->default(null);                 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_products');
    }
};
