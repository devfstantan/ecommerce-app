<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sku',
        'is_published',
        'price',
        'image',
        'description',
        'store_id'
    ];

    public function store(){
        return $this->belongsTo(Store::class);
    }

}
