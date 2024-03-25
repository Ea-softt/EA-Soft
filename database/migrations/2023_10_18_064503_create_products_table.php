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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('product_id')->nullable()->default(null);
            $table->string('product_no')->nullable()->default(null);
            $table->string('product_name')->nullable()->default(null);
            $table->string('sell_price')->nullable()->default(null);
            $table->string('cprice')->nullable()->default(null);
            $table->string('quantity')->nullable()->default(null);
            $table->string('unit')->nullable()->default(null);;
            $table->string('min_stocks')->nullable()->default(null);
            $table->string('expire_date')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
            //$table->foreign('product_id')->references('sid')->on('warehouses')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
