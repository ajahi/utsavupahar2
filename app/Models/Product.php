<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements HasMedia, Searchable
{
    use HasFactory,InteractsWithMedia;
    protected $guarded=[];

    public function getSearchResult(): SearchResult
    {
        $url = route('front.product', $this->slug);
        
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

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
