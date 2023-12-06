<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 1, // User ID of the order owner
            'order_number' => 'ORDER123',
            'total_amount' => 100.00,
            'status' => 'Processing',
            'shipping_address' => '123 Main St, City, Country',
            'billing_address' => '456 Billing St, City, Country',
            'payment_method' => 'Credit Card',
            'special_message' => 'Happy Birthday!',
            'preferred_delivery_date' => '2023-01-15',
            'recipient_name' => 'John Doe',
        ]);

        Order::create([
            'user_id' => 2,
            'order_number' => 'ORDER456',
            'total_amount' => 75.50,
            'status' => 'Shipped',
            'shipping_address' => '789 Shipping Ave, City, Country',
            'billing_address' => '123 Billing St, City, Country',
            'payment_method' => 'PayPal',
            'special_message' => 'Congratulations!',
            'preferred_delivery_date' => '2023-02-10',
            'recipient_name' => 'Jane Smith',
        ]);
    }
}
