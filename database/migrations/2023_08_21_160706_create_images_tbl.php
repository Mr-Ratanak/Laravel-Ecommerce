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
        Schema::create('images_tbl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_tbl_id');
            $table->string('images');
            $table->foreign('products_tbl_id')->references('id')->on('products_tbl')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_tbl');
    }
};
