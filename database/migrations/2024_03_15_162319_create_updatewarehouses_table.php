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
        Schema::create('updatewarehouses', function (Blueprint $table) {
            $table->id();
             $table->integer('product_id')->nullable()->default(null);
            $table->string('productname')->nullable()->default(null);
            $table->decimal('quantity',65 ,5)->nullable()->default(null);
            $table->decimal('price',65 ,5)->nullable()->default(null);
            $table->decimal('tprice',65 ,5)->nullable()->default(null);
            $table->string('companyname')->nullable()->default(null);
            $table->string('unity')->nullable()->default(null);
            $table->integer('expiredate')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('images')->nullable()->default(null);        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updatewarehouses');
    }
};
