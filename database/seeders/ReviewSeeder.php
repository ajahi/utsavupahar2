<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 1, // Replace with the user ID for the reviewer
                'product_id' => 1, // Replace with the product ID being reviewed
                'rating' => 5, // Rating (out of 5 stars)
                'comment' => 'Excellent product!',
                
            ],
            [
                'user_id' => 2, // Replace with the user ID for the reviewer
                'product_id' => 2, // Replace with the product ID being reviewed
                'rating' => 4,
                'comment' => 'Good product, fast delivery.',
                
            ],
            // Add more reviews as needed
        ];

        // Loop through the review data and create review records
        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
