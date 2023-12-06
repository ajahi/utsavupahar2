<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
       
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('order_number')->unique();
                $table->decimal('total_amount', 10, 2);
                $table->string('status');
                $table->text('shipping_address');
                $table->text('billing_address');
                $table->string('payment_method');
                $table->string('special_message')->nullable(); // Special message to be attached to the gift
                $table->date('preferred_delivery_date')->nullable(); // Preferred delivery date
                $table->string('recipient_name')->nullable(); // Name of the recipient
                $table->timestamps();
    
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        

        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Foreign key to link with the order
            $table->unsignedBigInteger('product_id'); // Foreign key to link with the product
            $table->integer('quantity'); // Quantity of the product in the order
            $table->decimal('unit_price', 10, 2); // Price of the product at the time of the order
            $table->decimal('total_price', 10, 2); // Total price for the quantity of this product
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
    }
}
