<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['sender_team_id', 'receiver_team_id', 'status'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'receiver_team_id');
    }

    public function senderTeam()
    {
        return $this->belongsTo(Team::class, 'sender_team_id');
    }


    public function scopeTeamlist($query)
    {

        return $query->with(['receiverTeam'])->where('sender_team_id', Auth::user()->current_team_id)->where('status', 2);

    }

    public function receiverTeam()
    {
        return $this->belongsTo(Team::class, 'receiver_team_id');
    }
}
