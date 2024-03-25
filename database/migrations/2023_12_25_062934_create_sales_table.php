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
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('reciept_no');
            $table->bigInteger('customer_id')->nullable()->default(null);
            $table->string('username')->nullable()->default(null);
            $table->decimal('discount',65 ,5)->nullable()->default(null);
            $table->decimal('total',65 ,5)->nullable()->default(null);
            $table->decimal('grandtotal',65 ,5)->nullable()->default(null);
            $table->integer('days')->nullable()->default(null);
            $table->string('month')->nullable()->default(null);
            $table->integer('year')->nullable()->default(null);
            $table->integer('typeofcash')->nullable()->default(null);
            $table->timestamp('created_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
