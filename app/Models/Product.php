<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=[
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    public function carst()
    {
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders()
    {
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function scopeAvailable($query)
    {
        return $query->where('status','available');
    }
}
