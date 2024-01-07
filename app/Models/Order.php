<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function meals()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function price()
    {
        return $this->hasMany(OrderDetails::class)->sum('price');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getStatusAttribute()
    {
        $status = $this->attributes['status'];
        if ($status == 1) {
            return "pending";
        } elseif ($status == 2) {
            return "In preparation";
        } elseif ($status == 3) {
            return "Delivery on the way";
        } elseif ($status == 4) {
                return "Delivery on the way";
        } elseif ($status == 5) {
            return "Done";
        }
    }

    public function getPaymentTypeAttribute()
    {
        $payment_type = $this->attributes['payment_type'];
        if ($payment_type == 1) {
            return "Cash";
        } elseif ($payment_type == 2) {
            return "Syriatell Cash";
        } elseif ($payment_type == 3) {
            return "MTN Cash";
        }
    }
}
