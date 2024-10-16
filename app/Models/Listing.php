<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'category_id',
        'storeowner_id',
        'status',
    ];

    protected $with = ['category', 'storeowner'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storeowner()
    {
        return $this->belongsTo(Storeowner::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'listing_id');
    }
}
