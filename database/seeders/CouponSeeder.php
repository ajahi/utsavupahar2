<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'code' => 'COUPON1',
                'title' => '10% off on all products',
                'discount_type' => 'percentage',
                'discount_value' => 10.0,
                'min_order_amount' => 50.0,
                'max_uses' => 100,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'is_active' => true,
            ],
            [
                'code' => 'COUPON2',
                'title' => '$20 off on orders over $100',
                'discount_type' => 'fixed',
                'discount_value' => 20.0,
                'min_order_amount' => 100.0,
                'max_uses' => 50,
                'start_date' => now(),
                'end_date' => now()->addDays(60),
                'is_active' => true,
            ],
            [
                'code' => 'COUPON3',
                'title' => '15% off on selected items',
                'discount_type' => 'percentage',
                'discount_value' => 15.0,
                'min_order_amount' => 40.0,
                'max_uses' => 75,
                'start_date' => now(),
                'end_date' => now()->addDays(45),
                'is_active' => true,
            ],
            [
                'code' => 'COUPON4',
                'title' => '$30 off on orders over $150',
                'discount_type' => 'fixed',
                'discount_value' => 30.0,
                'min_order_amount' => 150.0,
                'max_uses' => 30,
                'start_date' => now(),
                'end_date' => now()->addDays(90),
                'is_active' => true,
            ]
        ];

        // Insert coupons into the database
        foreach ($coupons as $couponData) {
            Coupon::create($couponData);
        }
    }
}
