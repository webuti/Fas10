<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableDay extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'date'];

    protected $casts = [
        'date' => 'date:d/m/Y',
    ];
}
