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
        Schema::create('products_tbl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_tbl_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->double('original_price');
            $table->double('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('featured')->default('0')->comment('1=featured,0=not-featured');
            $table->tinyInteger('status')->default('0')->comment('1=hidden,0=visible');

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->foreign('category_tbl_id')->references('id')->on('category_tbl')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tbl');
    }
};
