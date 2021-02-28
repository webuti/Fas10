<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\UpdatesTeamServices;

class UpdateTeamService implements UpdatesTeamServices
{
    /**
     * @param mixed $user
     * @param mixed $team
     * @param array $input
     * @return void
     */
    public function update($user, $team, array $input)
    {

        Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'services' => [],
        ])->validateWithBag('updateTeamService');

        $team->forceFill([
            'name' => $input['name'],
        ])->save();
    }
}
