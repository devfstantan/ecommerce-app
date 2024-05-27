<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','address','phone','manager_id'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }
}
