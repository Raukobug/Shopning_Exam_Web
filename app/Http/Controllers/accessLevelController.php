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
		$accessLevel = DB::table('access_level')->select('id','name')->get();
		
		echo json_encode($accessLevel);
        //
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
        if($request->isMethod('post')){
			DB::table('access_level')->insert(['name' => $request->input('name')]);
		}    
		//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function show(accessLevel $accessLevel)
    {
		echo "Hej";
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(accessLevel $accessLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accessLevel $accessLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(accessLevel $accessLevel)
    {
        //
    }
}
