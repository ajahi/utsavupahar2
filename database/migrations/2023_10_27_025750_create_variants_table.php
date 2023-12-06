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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('product_id'); // Foreign key reference
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
