<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function district($cityId)
    {

        return District::where('city_id', $cityId)->get();


    }
}
