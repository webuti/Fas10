<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\BidCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Bids/Index', [
            'data' => Bid::with(['team', 'city'])->owned()->orderBy('id', 'desc')->paginate()
        ]);
    }


    public function catalog($type = false, $category = "0")
    {

        $categories = BidCategory::where('parent_id', 0)->with(['children.children'])->get();


        if (!$type) {
            $bids = \App\Models\Bid::with(['city', 'country', 'images'])->filtered();
            if ($category !== "0") {
                $bids->category($category);
                $categoryInfo = BidCategory::where('seo_url', $category)->first();

            } else {
                $categoryInfo = ['name' => 'İlanlar'];
            }

            return Inertia::render('Catalog/Bid', [
                'formData' => [
                    'city_id' => request()->input('city_id'),
                    'country_id' => request()->input('country_id', 1),
                    'services' => request()->input('services'),
                ],
                'bids' => $bids->paginate(),
                'cities' => City::all(),
                'countries' => Country::all(),
                'services' => Service::all(),
                'sector' => false,
                'sectors' => Sector::all(),
                'category' => $category,
                'categoryInfo' => $categoryInfo,
                'categories' => $categories
            ]);
        }
        if ($sector = \App\Models\Sector::where('seo_url', $type)->first()) {

            $bids = \App\Models\Bid::with(['city', 'country', 'images'])->filtered()->sector($sector->id);
            if ($category !== "0") {
                $bids->category($category);
                $categoryInfo = BidCategory::where('seo_url', $category)->first();

            } else {
                $categoryInfo = ['name' => 'İlanlar'];
            }

            return Inertia::render('Catalog/Bid', [
                'formData' => [
                    'city_id' => request()->input('city_id'),
                    'country_id' => request()->input('country_id', 1),
                    'services' => request()->input('services'),
                ],
                'bids' => $bids->paginate(),
                'cities' => City::all(),
                'countries' => Country::all(),
                'services' => Service::all(),
                'sector' => $type,
                'category' => $category,
                'categoryInfo' => $categoryInfo,
                'categories' => $categories
            ]);
        }

    }

    public function catalogDetail($id)
    {
        return Inertia::render('Catalog/BidDetail', [
            'bid' => \App\Models\Bid::where("id", $id)->with(['city', 'country', 'images', 'company'])->firstOrFail(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Bids/Create',
            ['sectors' => Sector::get(),
                'cities' => City::all(),
                'countries' => Country::all(),
                'categories' => BidCategory::with(['children'])->get(),
                'companySector' => Team::currentTeamSectorId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'category_id' => ['required'],
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['team_id'] = Auth::user()->current_team_id;
        $input['status_id'] = 1;
        $files = $input['files'];

        unset($input['files']);
        unset($input['fields']);
        if ($bid = Bid::create($input)) {

            foreach ($files as $photo) {


                $destination = "/uploads/bids/" . $bid->id . "/" . $photo;
                $imageSet = Image::create([
                    'image' => "/storage" . $destination,
                    'image_caption' => $photo,
                    'bid_id' => $bid->id,
                    'gallery_id' => $bid->id,
                    'status_id' => "1",
                    'type_id' => "1",
                    'user_id' => $input['user_id'],
                    'team_id' => $input['team_id'],
                ]);
                if ($imageSet) {

                    Storage::disk('local')->move("uploads/tmp/" . $photo, "public" . $destination);
                }
            }

            return Redirect::route('bids.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid, User $user)
    {

        if (Auth::user()->id !== $bid->user_id) {

            session()->flash('status', 'Bu ilanı düzenleme yetkiniz yok');
            return Redirect::route('bids.index');

        }


        return Inertia::render('Bids/Show', [
            'bid' => $bid,
            'sectors' => Sector::get(),
            'images' => Image::where('bid_id', $bid->id)->get()->pluck('image'),
            'companySector' => Team::currentTeamSectorId(),
            'cities' => City::all(),
            'countries' => Country::all(),
            'categories' => BidCategory::with(['children'])->get(),

        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid, User $user)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Bid $bid, Request $request)
    {
        $input = $request->all();


        if (Auth::user()->id !== $bid->user_id) {


            return Redirect::route('bids.index')->with('Bu ilanı düzenleme yetkiniz yok');

        }


        if ($bid->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'sector_id' => $input['sector_id'],
            'district_id' => $input['district_id'],
            'city_id' => $input['city_id'],
            'country_id' => $input['country_id'],
            'category_id' => $input['category_id'],
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->current_team_id,

        ])) {

            $request->session()->flash('message', 'İlan başarılı olarak güncellendi');


        }
        return Redirect::route('bids.show', $bid->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
