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
            $table->string('title',200); // Title can be big
            $table->string('short_des',500); // Big space needed
            $table->string('price',50);
            $table->boolean('discount'); // True or false (discount have or not)
            $table->string('image',300); // Big space needed
            $table->boolean('stock');// True or false (stock available or not)
            $table->float('star');// Rating system
            $table->enum('remark',['popular','new','top','special','trending','regular']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            //Foreign key for category, brand table id

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnUpdate()->restrictOnDelete();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
