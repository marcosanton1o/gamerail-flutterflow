<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'developer',
        'publisher',
        'total_sales',
        'image',
        'description',
        'release_date',
        'category'
    ];
}