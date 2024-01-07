<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['name'];

    protected $fillable = ['restaurant_id'];
    public function restaurant (){
        return $this->belongsTo(Restaurant::class);
    }


}
