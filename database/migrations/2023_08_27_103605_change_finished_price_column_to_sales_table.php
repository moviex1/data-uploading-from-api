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
        Schema::table('sales', function (Blueprint $table) {
            $table->decimal('finished_price', 10)->change();
            $table->decimal('for_pay', 10)->change();
            $table->decimal('price_with_disc', 10)->change();
            $table->decimal('total_price', 10)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedDecimal('for_pay')->change();
            $table->unsignedInteger('finished_price')->change();
            $table->unsignedDecimal('price_with_disc')->change();
            $table->unsignedInteger('total_price')->change();
        });
    }
};
