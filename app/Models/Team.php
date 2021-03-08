<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends JetstreamTeam
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'personal_team',
        'description', 'phone',
        'number_of_staff', 'city_id', 'district_id', 'country_id', 'sector_id'

    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];


    static function currentTeamSectorId()
    {
        return self::whereId(Auth::user()->current_team_id)->first()->sector_id;
    }

    public function scopeFiltered($query)
    {

        if (request()->input('city') !== null) {

            $query->where('city_id', request()->input('city'));
        }
        if (request()->input('number_of_staff') !== null) {

            $query->where('number_of_staff', (request()->input('number_of_staff')));
        }
        return $query;
    }

    public function scopeSector($query, $id)
    {
        return $query->where('sector_id', $id);
    }

    public function services()
    {
        return $this->hasMany(TeamService::class,'team_id','id');
    }


}
