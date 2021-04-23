<?php

namespace App\Actions\Jetstream;

use App\Models\Bid;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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


        $updated = $team->forceFill([
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


        if ($updated) {
            foreach ($input['files'] as $photo) {
                $destination = "/uploads/companies/" . Auth::user()->current_team_id . "/" . $photo;
                $imageSet = Image::create([
                    'image' => "/storage" . $destination,
                    'image_caption' => $photo,
                    'bid_id' => Auth::user()->current_team_id,
                    'gallery_id' => Auth::user()->current_team_id,
                    'status_id' => "1",
                    'type_id' => "2",
                    'user_id' => Auth::user()->id,
                    'team_id' => Auth::user()->current_team_id
                ]);
                if ($imageSet) {

                    Storage::disk('local')->move("uploads/tmp/" . $photo, "public" . $destination);
                }
            }

        }
    }
}

