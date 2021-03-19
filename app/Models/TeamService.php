<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Jetstream;

class TeamService extends Model
{
    protected $fillable = [
        'service_id',
        'sector_id',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Jetstream::teamModel());
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
}
