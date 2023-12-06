<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Variant;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $colorNames = [
            'Red',
            'Blue',
            'Green',
            
            // Add more color names as needed
        ];

        foreach ($colorNames as $colorName) {
            Variant::create([
                'name' => $colorName,
                'status' => 'In stock',
                'quantity' => rand(100,5),  // Set the quantity as needed
                'price' =>rand(10,5),  // Set the price as needed
                'product_id' => 1,
            ]);
        }
    }
}
