<?php

namespace App\Http\Controllers;

use App\shop;
use App\openingHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$shop = shop::all();	
        //return $shop->toJson();
		
		// return shop::with(['openingHour' => function($q) {
             // $q->select('id', 'day');
         // }])->get();	
		 
		  return shop::with(['openingHour'])->get();
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
        $shop = new shop;      

        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->phone = $request->phone;

        $shop->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = shop::find($id);
        return $shop->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $shop = shop::find($id);
        //NEED FORM DATA HERE
        $shop->name = "sams";
        $shop->email = "sams@sams.dk";
        $shop->phone = "999-9998";
        $shop->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = shop::find($id);
        $shop->delete();
    }
}
