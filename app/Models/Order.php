<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'shipping_address',
        'billing_address',
        'payment_method',
        'special_message', // Special message to be attached to the gift
        'preferred_delivery_date', // Preferred delivery date for the order
        'recipient_name', // Payment method used (e.g., credit card, PayPal)
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
