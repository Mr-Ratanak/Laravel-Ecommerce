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
        Schema::create('products_color_tbl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_tbl_id');
            $table->unsignedBigInteger('colors_id')->nullable();
            $table->integer('quantity');
            $table->foreign('products_tbl_id')->references('id')->on('products_tbl')->onDelete('cascade');
            $table->foreign('colors_id')->references('id')->on('color_tbl')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_color_tbl');
    }
};
