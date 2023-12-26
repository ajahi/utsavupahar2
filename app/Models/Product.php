<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $guarded=[];

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function variants(){
        return $this->hasMany(Variant::class);
    }

    public function similarCategoryProduct(){
        return $this->category()->first()->products();
    }

    public function similarCategoryProducts()
    {
        $postCategories = $this->category()->pluck('id');

        return $this::whereHas('category', function ($query) use ($postCategories) {
            $query->whereIn('category_id', $postCategories);
        })->where('id', '!=', $this->id)->get();
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    
}
