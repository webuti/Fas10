<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

}
