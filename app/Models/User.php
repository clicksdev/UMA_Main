<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'phone', 'coins', 'current_lang', 'device_type', 'firebase_token', 'is_seen'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['remember_token'];

    protected $appends = ['rated_products'];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->toDateString();
    }


    public function userCodes()
    {
        return $this->hasMany(UserCode::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id')->orderByDesc('id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'user_packages')->withPivot('price', 'coins_num', 'payment_status', 'package_id')->withTimestamps();
    }

    public function favouriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favourite_products');
    }

    public function auctions()
    {
        return $this->belongsToMany(Auction::class, 'auction_users')->withPivot('auction_joining_coins')->withTimestamps()->latest();
    }

    public function notifications()
    {
        return $this->morphMany(UserNotification::class, 'user')->orderByDesc('id');
    }

    public function getRatedProductsAttribute()
    {
        $ratedProducts = [];
        $user = Auth::guard('users')->user();
        if ($user && $user->productReviews()->count()) {
            $ratedProducts = $user->productReviews()->pluck('product_id')->unique()->toArray();
        }
        return $ratedProducts;
    }
}
