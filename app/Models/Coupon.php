<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',          // The unique coupon code.
        'description',   // A description or additional information about the coupon.
        'discount_type', // The type of discount (e.g., percentage, fixed amount).
        'discount_value', // The value of the discount (e.g., 10% or $20).
        'min_order_amount', // Minimum order amount required to use the coupon.
        'max_uses',      // Maximum number of times the coupon can be used.
        'start_date',    // The start date when the coupon becomes valid.
        'end_date',      // The end date when the coupon expires.
        'is_active',     // Flag to indicate whether the coupon is active.
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
