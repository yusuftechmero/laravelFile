<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'main_image', 'additional_images'];

    // Convert additional_images JSON to an array
    protected $casts = [
        'additional_images' => 'array',
    ];
}

