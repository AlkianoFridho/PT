<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total_price'];

    public function orderItems()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
