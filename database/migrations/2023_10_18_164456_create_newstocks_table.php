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
        Schema::create('newstocks', function (Blueprint $table) {
            $table->id();
             $table->integer('productID')->nullable()->default(null);
             $table->string('product_no')->nullable()->default(null);
             $table->string('product_name')->nullable()->default(null);
             $table->decimal('sell_price', 65, 5)->nullable()->default(null);
             $table->decimal('cprice', 65, 5)->nullable()->default(null);
              $table->decimal('tcost', 65, 5)->nullable()->default(null);
             $table->decimal('quantity', 65, 5)->nullable()->default(null);
             $table->string('unit')->nullable()->default(null);
             $table->integer('min_stocks')->nullable()->default(null);
             $table->text('remarks')->nullable()->default(null);
             $table->integer('supplier_id')->nullable()->default(null);
             $table->string('images')->nullable()->default(null);
             $table->string('date_create')->nullable()->default(null);           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newstocks');
    }
};
