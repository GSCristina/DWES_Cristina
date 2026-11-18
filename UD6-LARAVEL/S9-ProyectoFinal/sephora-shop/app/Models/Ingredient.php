<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name','description','is_allergen'];
    protected $casts = ['is_allergen' => 'boolean'];
    public function products() { return $this->belongsToMany(Product::class); }
}
