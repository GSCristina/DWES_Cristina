<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','name','description','price','stock','is_available'];
    protected $casts = ['price' => 'decimal:2', 'is_available' => 'boolean'];
    public function brand() { return $this->belongsTo(Brand::class); }
    public function ingredients() { return $this->belongsToMany(Ingredient::class); }
}
