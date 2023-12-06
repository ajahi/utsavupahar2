<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()

    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('featured')->default(false);
            $table->string('refundable')->default(false);
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('dimension')->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('discount_p', 5, 2)->nullable(); // Change the column name here
            $table->decimal('sell_margin_p', 5, 2); // Change the column name here
            $table->string('meta_word')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
        
        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unique(['category_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
