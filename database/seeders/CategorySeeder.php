<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            
                'Chocolate Cake',
                // 'Vanilla Cake',
                // 'Butterscotch Cake',
                // 'Party Hats',
            
                'Silver Necklace',
                // 'Personalized Name Engraved Necklace',
                // 'Anniversary Roses Bouquet',
                // 'Champagne Glasses Set',
            
                'Baby Onesies Pack',
                // 'Baby Blanket Set',
                // 'Diaper Cake',
                // 'Baby Shower Balloons',
            
                'Diploma Frame',
                // 'Graduation Cap and Gown Set',
                // 'Personalized Graduation Mug',
                // 'Congratulations Banner',
            
                'Custom Logo Pen Set',
                // 'Executive Leather Notebook',
                // 'Corporate Gift Basket',
                // 'Desk Organizer',
            
                'His and Hers Pillowcases',
                // 'Wedding Vows Book',
                // 'Mr. and Mrs. Coffee Mugs',
                // 'Wedding Photo Album',
            
        ];

        $categories=[
            'Birthday',
            'Anniversary',
            'Baby-Shower',
            'Graduations',
            'Coorporate',
            'Marriage',
            
            
        ];
        foreach($categories as $category){
            $category = Category::Create(['name' => $category,'slug'=> Str::slug($category)]);
        }

        foreach ($products as $product) {
            
            

            // Create a product and associate it with the category
            $product = Product::create([
                'name' => $product,
                'slug'=>Str::slug($product),
                'description' => 'xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupi',
                'featured' => rand(0,1),
                'refundable' => rand(0,1),
                'weight' => rand(1,10),
                'dimension' => '10x10x5',
                'purchase_price' => rand(100,1999),
                'discount_p' => rand(5,10),
                'sell_margin_p' => 20.00,
                'meta_word' => 'Best ' . $product,
                'meta_description' => 'ercitation ullamco |laboris nisi ut aliquip | ex ea commodo consequat.',
                'view_count' => 0,
            ]);
        }
            

            // Associate the product with the category
            for($i=1;$i<6;$i++){
                $product=Product::findOrFail($i)->category()->attach($i);
                
            }
            
        }
        
    
}
