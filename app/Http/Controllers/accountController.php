<?php

namespace App\Http\Controllers;

use App\account;
use App\shop;
use App\accessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$account = account::all();
        return $account->toJson();   */
        $accounts = DB::table('user')
            ->join('access_level', 'user.access_level_id', '=', 'access_level.id')
            ->join('shop', 'user.shop_id', '=', 'shop.id')
            ->select('user.firstname', 'user.lastname', 'user.email', 'user.phone', 'user.shop_id', 'shop.name as shop_name', 'user.created_at', 'user.updated_at', 'user.access_level_id', 'access_level.name as access_level')
            ->get(); 
            return $accounts->toJson();
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
        $account = new account;
        $account->shop_id = $request->shop_id;
        $account->access_level_id = $request->access_level_id;
        $account->firstname = $request->firstname;
        $account->lastname = $request->lastname;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->password = $request->password;
        $account->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = account::find($id);
        $shop = shop::find($account->shop_id);
        $accessLevel = accessLevel::find($account->access_level_id);
        $account->shop_id = $shop;
        $account->access_level_id = $accessLevel;

        return $account->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        //
    }
}
