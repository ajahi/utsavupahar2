<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // User who wrote the review
        'product_id', // Product being reviewed
        'rating', // Rating of the product (e.g., 1-5 stars)
        'comment', // Review comment or text
    ];

    // Define a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
