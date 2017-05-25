<?php

namespace App\Http\Controllers;

use Session;
use App\account;
use App\shop;
use App\accessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Validator;

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
        /*$accounts = DB::table('user')
            ->join('access_level', 'user.access_level_id', '=', 'access_level.id')
            ->join('shop', 'user.shop_id', '=', 'shop.id')
            ->select('user.firstname', 'user.lastname', 'user.email', 'user.phone', 'user.shop_id', 'shop.name as shop_name', 'user.created_at', 'user.updated_at', 'user.access_level_id', 'access_level.name as access_level')
            ->get(); 
            return $accounts->toJson();*/
        return account::with(['AccessLevel' => function($a) {
            $a->select('id','name');
        }
        , 'shop' => function($q) {
            $q->select('id', 'name');
        }])->get();

    }
	
	public function webIndex()
    {
		
		if(Auth::user()->shop_id != null){
				$accounts = account::with([
				'shop' => function($q) {$q->select('id', 'name');
				}])->where('shop_id', Auth::user()->shop_id)->get();
		}else{
				$accounts = account::with([
				'shop' => function($q) {$q->select('id', 'name');
				}])->get();
		}
		
        
        return view("user/List")
				->with("users", $accounts);
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
        $account->password = bcrypt($request->password);
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
		if($account == null){
			return "User not found!";
		}
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
    public function edit($id)
    {
        $user = account::find($id);

        return view('user/Edit')->with('user', $user);
		//
    }

	
	public function updateFromView(Request $request, $id)
    {
        $account = account::find($id);
        $account->firstname = $request->firstname;
        $account->lastname = $request->lastname;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->password = bcrypt($request->password);
        $account->save();
		return redirect('/users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $account = account::find($id);
		
		if($account == null){
			return "User not found!";
		}
		
        $account->shop_id = ($request->shop_id != null ? $request->shop_id : $account->shop_id);
        $account->access_level_id = ($request->access_level_id != null ? $request->access_level_id : $account->access_level_id);
        $account->firstname = ($request->firstname != null ? $request->firstname : $account->firstname);
        $account->lastname = ($request->lastname != null ? $request->lastname : $account->lastname);
        $account->email = ($request->email != null ? $request->email : $account->email);
        $account->phone = ($request->phone != null ? $request->phone : $account->phone);
        $account->password = ($request->password != null ? bcrypt($request->password) : $account->password);
        $account->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = account::find($id);
        $account->delete();
    }
	
	public function removeUser($id)
    {
        $user = account::find($id);
        $user->delete();
		return redirect('/users');
    }
	
	public function logout(){
		Session::forget('shopId');
		Auth::logout();
		return redirect('/');
	}
	
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
