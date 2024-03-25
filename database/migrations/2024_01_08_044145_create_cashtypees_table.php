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
        Schema::create('cashtypees', function (Blueprint $table) {
            $table->id();
            $table->integer('suppliername')->nullable()->default(null);
            $table->string('batchno')->nullable()->default(null);
            $table->decimal('currentpayment',65 ,5);
            $table->decimal('suppliercurentbilling',65 ,5);
            $table->decimal('amountpaid',65 ,5);
            $table->decimal('amountpayable',65 ,5);
            $table->string('remark')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashtypees');
    }
};
