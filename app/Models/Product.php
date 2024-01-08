<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function similarCategoryProduct()
    {
        return $this->category()->first()->products();
    }

    public function similarCategoryProducts()
    {
        $postCategories = $this->category()->pluck('id');

        return $this::whereHas('category', function ($query) use ($postCategories) {
            $query->whereIn('category_id', $postCategories);
        })->where('id', '!=', $this->id)->get();
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating(): Attribute
    {
        return Attribute::make(
            get: $this->review()->avg('rating'),
        );
    }

    // public function getAverageRatingAttribute()
    // {
    //     return $this->review()->avg('rating');
    // }

    public function scopeFilter($query, $filters)
    {
        $query
            ->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn ($query) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')));
        $query
            ->when(
                $filters['category'] ?? false,
                fn ($query, $category) =>
                $query->whereHas('category', fn ($query) =>
                $query->whereIn('categories.id', $category))
            );
        $query
            ->when(
                $filters['rating'] ?? false,
                fn ($query, $rating) =>
                $query->where(function () use ($rating) {
                    return $this->review()->avg('rating') >= $rating;
                })
            );
        $query
            ->when($filters['sorting'] ?? false, function ($query, $sort) {
                return $query->orderBy($sort['by'], $sort['order']);
            });
    }
}
