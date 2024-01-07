<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['description','title'];

    protected $fillable = ['name','city','email','password','mobile','image','open_time','close_time','user_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories (){
        return $this->hasMany(Category::class);
    }
    public function meals (){

        return $this->hasMany(Meal::class);
    }

    public function rate()
    {
        $number_of_reviews = $this->morphMany(Review::class,'reviewable')->count();
        if ($number_of_reviews == 0 )
            return 0;
        $sum =  $this->morphMany(Review::class,'reviewable')->sum('rate');
        return $sum/$number_of_reviews;
    }

    public function reviews()
    {
        return $this->morphMany(Review::class,'reviewable');
    }
}
