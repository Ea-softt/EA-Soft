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
        Schema::create('suppliercompanies', function (Blueprint $table) {
            $table->id();
            $table->string('companynameid')->nullable()->default(null);
            $table->decimal('price2',65 ,5)->nullable()->default(null);
            $table->decimal('multtota2',65 ,5)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliercompanies');
    }
};
