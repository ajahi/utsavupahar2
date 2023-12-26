<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $user=User::all()->first();
        $reviews = [
            [
                'user_id' => $user->id, // Replace with the user ID for the reviewer
                'product_id' => 1, // Replace with the product ID being reviewed
                'rating' => 5, // Rating (out of 5 stars)
                'comment' => 'Excellent product!',
                
            ],
            [
                'user_id' => $user->id, // Replace with the user ID for the reviewer
                'product_id' => 2, // Replace with the product ID being reviewed
                'rating' => 4,
                'comment' => 'Good product, fast delivery.',
                
            ],
            [
                'user_id' => $user->id,
                'product_id' => 3,
                'rating' => 4,
                'comment' => 'Great product! I loved it.',
            ],
    
            [
                'user_id' => $user->id,
                'product_id' => 3,
                'rating' => 5,
                'comment' => 'Excellent quality. Would buy again!',
            ]
    ,
            [
                'user_id' => $user->id,
                'product_id' => 2,
                'rating' => 3,
                'comment' => 'Good product, but there is room for improvement.',
            ],
    
            [
                'user_id' => $user->id,
                'product_id' => 2,
                'rating' => 4,
                'comment' => 'Satisfied with my purchase.',
            ]
            // Add more reviews as needed
        ];

        // Loop through the review data and create review records
        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
