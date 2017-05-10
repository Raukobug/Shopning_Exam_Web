<?php

namespace App\Http\Controllers;

use App\openingHour;
use App\shop;
use Illuminate\Http\Request;

class openingHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return openingHour::with(['shop' => function($q) {
            $q->select('id', 'name');
        }])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $openingHour = new openingHour;
        $openingHour->shop_id = $request->shop_id;
        $openingHour->day = $request->day;
        $openingHour->open = $request->open;
        $openingHour->close = $request->close;
        $openingHour->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\openingHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $openingHour = openingHour::find($id);
        $shop = shop::find($openingHour->shop_id);
        $openingHour->shop_id = $shop;

        return $openingHour->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\openingHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function edit(openingHour $openingHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\openingHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $openingHour = openingHour::find($id);
        //NEED FORM DATA HERE
        $openingHour->shop_id = 1;
        $openingHour->day = "monday";
        $openingHour->open = "12:00";
        $openingHour->close = "22:00";
        $openingHour->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\openingHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $openingHour = openingHour::find($id);
        $openingHour->delete();
    }
}
