<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements HasMedia, Searchable
{
    use HasFactory,InteractsWithMedia;
    protected $guarded=[];

    public function getSearchResult(): SearchResult
    {
    $url = route('front.category', $this->slug);
    
        return new \Spatie\Searchable\SearchResult(
        $this,
        $this->name,
        $url
        );
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function getAssociatedValue($key)
    {
        return $this->options()->where('key', $key)->pluck('value');
    }

    

    public static function getAllCategoriesWithProducts()
    {
        // Retrieve all categories with their associated products
        return self::with('products')->get();
    }
}
