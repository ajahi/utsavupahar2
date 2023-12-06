<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // The name or title of the package
        'description', // A brief description of the package
        'is_available', // Indicates whether the package is available for purchase
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'package_product');
    }
}
