<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidOffer extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'body', 'bid_id','team_id'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function company()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

}
