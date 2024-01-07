<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = ['restaurant_id', 'category_id','image','price'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
