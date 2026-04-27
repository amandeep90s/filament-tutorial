<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'sku', 'description', 'price', 'stock', 'image', 'is_active', 'is_featured'])]
class Product extends Model
{
    //
}
