<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use App\Models\Product;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $countryId=$request->session()->get('filter_country_id', null);
        if($countryId){
            $hotels=Hotel::where('country_id',$countryId)->get();
        }
        else{
            $hotels=Hotel::all();
        }
        return view('hotels.index', ['hotels'=>$hotels, 'countries'=>Country::all(), 'filter_country_id'=>$countryId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('hotels.edit', ['countries'=>Country::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Hotel::create($request->all());
        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', [
            'hotel'=>$hotel,
            'countries'=>Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hotel $hotel)
    {

        $hotel->fill($request->all());
        $photo=$request->file('image');
        $photo_name=$hotel->id.'.'.$photo->extension();
        $hotel->photo=$photo_name;
        $photo->storeAs('public/hotels',$photo_name);
        $hotel->save();
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index');
    }

    public function countryHotels($id)
    {
        return view('hotels.index', ['hotels'=>Hotel::where('country_id', $id)->get()]);
    }

    public function filterHotels(Request $request){
        $request->session()->put('filter_country_id', $request->country_id);
        return redirect()->route('hotels.index');
    }
}
