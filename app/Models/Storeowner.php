<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Storeowner extends Model{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'store_description',
        'store_slug',
        'status',
        'user_id',
    ];
}