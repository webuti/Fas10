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
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Jetstream::teamModel());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'bid_id', 'id');
    }

    public function scopeOwned($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeSector($query, $id)
    {
        return $query->where('sector_id', $id);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
