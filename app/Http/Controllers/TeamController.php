<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\TeamType;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {

        return ['cities' => City::get(),
            'countries' => Country::get(),
            'services' => Service::get(),
            'types' => TeamType::get(),
            'sectors' => Sector::get()];

    }
}
