<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;

class UpdateTeamName implements UpdatesTeamNames
{
    /**
     * Validate and update the given team's name.
     *
     * @param mixed $user
     * @param mixed $team
     * @param array $input
     * @return void
     */
    public function update($user, $team, array $input)
    {
        Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'number_of_staff' => ['integer'],
            'sector_id' => ['integer'],
            'type_id' => ['integer'],
            'city_id' => ['required', 'integer'],
        ])->validateWithBag('updateTeamName');

        $team->forceFill([
            'name' => $input['name'],
            'description' => $input['description'],
            'city_id' => $input['city_id'],
            'district_id' => $input['district_id'],
            'country_id' => $input['country_id'],
            'sector_id' => $input['sector_id'],
            'type_id' => $input['type_id'],

            'phone' => $input['phone'],
            'number_of_staff' => $input['number_of_staff'],
        ])->save();
    }
}
