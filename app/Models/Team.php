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
        'created_at' => 'datetime:Y-m-d H:i:s',
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
        'number_of_staff', 'city_id', 'district_id', 'country_id', 'sector_id', 'type_id'

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

        if (request()->input('city_id') !== null) {

            $query->where('city_id', request()->input('city_id'));
        }
        if (request()->input('country_id') !== null) {

            $query->where('country_id', request()->input('country_id'));
        }


        if (request()->input('services') !== null) {
            $query->join('team_services', 'team_services.team_id', '=', 'teams.id')
                ->whereIn('team_services.service_id', request()->input('services'));

        }

        return $query;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'team_id', 'id');
    }

    public function partners()
    {
        return $this->hasMany(Partner::class, 'receiver_team_id', 'id')->where('status', 2);
    }

    public function scopeSector($query, $id)
    {
        return $query->where('teams.sector_id', $id);
    }

    public function scopePartnerList($query)
    {

        return $query->with(['partners.senderTeam']);

    }

    public function services()
    {
        return $this->hasMany(TeamService::class, 'team_id', 'id');
    }


}
