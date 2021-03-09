<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'image_caption',
        'bid_id',
        'type_id',
        'gallery_id',
        'user_id',
        'team_id',
    ];

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }

}
