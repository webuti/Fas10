<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidOffer extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'body', 'bid_id','team_id'];
}
