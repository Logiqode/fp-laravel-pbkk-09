<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Listing extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'category',
        'storeowner_id',
    ];
}