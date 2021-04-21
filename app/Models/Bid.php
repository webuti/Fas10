<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;

class Bid extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'sector_id',
        'team_id',
        'category_id',
        'country_id',
        'district_id',
        'city_id',
        'status_id',
        'price',
        'fields',
        'offer_type',
        'currency_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function team()
    {
        return $this->belongsTo(Jetstream::teamModel());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'bid_id', 'id');
    }
    public function offers()
    {
        return $this->hasMany(BidOffer::class, 'bid_id', 'id');
    }
    public function scopeOwned($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeSector($query, $id)
    {
        return $query->where('sector_id', $id);
    }

    public function scopeCategory($query, $name)
    {

        return $query->where('category_id', BidCategory::where('seo_url', $name)->first()->id);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFiltered($query)
    {

        if (request()->input('city_id') !== null) {

            $query->where('city_id', request()->input('city_id'));
        }
        if (request()->input('country_id') !== null) {

            $query->where('country_id', request()->input('country_id'));
        }

        return $query;
    }

}
