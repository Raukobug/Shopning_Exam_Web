<?php

namespace App\Http\Controllers;

use App\accessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accessLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessLevel = accessLevel::all();
        return $accessLevel->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessLevel = new accessLevel;
        $accessLevel->name = $request->name;
        $accessLevel->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accessLevel = accessLevel::find($id);
        return $accessLevel->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $accessLevel = accessLevel::find($id);
        //NEED FORM DATA HERE
        $accessLevel->name = "Admin";
        $accessLevel->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessLevel = accessLevel::find($id);
        $accessLevel->delete();     
    }
    
}
