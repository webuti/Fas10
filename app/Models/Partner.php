<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['sender_team_id', 'receiver_team_id', 'status'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'receiver_team_id');
    }
}
