<?php

namespace App\Http\Controllers;

use App\visitStatistic;
use App\item;
use Illuminate\Http\Request;

class visitStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitStatistic = visitStatistic::all();
        return $visitStatistic->toJson();
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
        $visitStatistic = new visitStatistic;
        $visitStatistic->shop_id = $request->shop_id;
        $visitStatistic->visit_count = 1;
        $visitStatistic->unique_visit_count = 1;
        $visitStatistic->date = $request->date;
        $visitStatistic->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\visitStatistic  $visitStatistic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitStatistic = visitStatistic::find($id);
        $item = item::find($visitStatistic->item_id);
        $visitStatistic->item_id = $item;

        return $visitStatistic->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\visitStatistic  $visitStatistic
     * @return \Illuminate\Http\Response
     */
    public function edit(visitStatistic $visitStatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\visitStatistic  $visitStatistic
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $visitStatistic = visitStatistic::find($id);
        $visitStatistic->visit_count += $request->visit_count;
        $visitStatistic->unique_visit_count += $request->unique_visit_count;
        $visitStatistic->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\visitStatistic  $visitStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitStatistic = visitStatistic::find($id);
        $visitStatistic->delete();
    }
}
