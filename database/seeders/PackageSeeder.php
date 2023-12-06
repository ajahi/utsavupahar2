<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $package1 = Package::create([
            'name' => 'Father day package',
            'description' => 'A basic package for the best father.',
            'is_available' => true,
        ]);

        $package2 = Package::create([
            'name' => 'Bhai Tika package',
            'description' => 'An advanced package for loving brother and sister',
            'is_available' => true,
        ]);

        $package3 = Package::create([
            'name' => 'Birthday Package',
            'description' => 'Our premium package with exclusive features',
            'is_available' => false,
        ]);

        // Seed some sample products
        


        // Attach products to packages with quantity
        $package1->products()->sync([1,2]);

        $package2->products()->sync([3,4]);

        // Add more package and product data and relationships as needed
    
    }
}
