<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Service;
use App\Models\Sector;
use App\Models\Team;
use App\Models\TeamService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();


        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);

        Jetstream::inertia()->whenRendering(
            'Teams/Show',
            function (Request $request, array $data) {


                return array_merge($data, [
                    'cities' => City::get(),
                    'countries' => Country::get(),
                    'services' => Service::get(),
                    'companyServices' => $data["team"]->where('id', Auth::user()->current_team_id)->with('services')->get()->pluck('services')->toArray(),
                    'sectors' => Sector::get(),
                ]);

            }
        );

        Jetstream::inertia()->whenRendering(
            'Teams/Create',
            function (Request $request, array $data) {

                return array_merge($data, [
                    'cities' => City::get(),
                    'countries' => Country::get(),
                    'services' => Service::get(),
                    'sectors' => Sector::get(),
                ]);

            }
        );
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', __('Yonetici'), [
            'create',
            'read',
            'update',
            'delete',
        ])->description(__('Şirket hakkındaki herşeyi yapabilir'));

        Jetstream::role('editor', __('İlan Yöneticisi'), [
            'read',
            'create',
            'update',
        ])->description(__('Sadece ilanları yönetebilir'));
        Jetstream::role('operasyon', __('Operasyon Yöneticisi'), [
            'read',
            'create',
            'update',
        ])->description(__('Sadece operasyonları yönetebilir'));

    }
}
