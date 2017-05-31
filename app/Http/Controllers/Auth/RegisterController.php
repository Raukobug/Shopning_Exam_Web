<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\accessLevel;
use App\shop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function showRegistrationForm(){
		if(Auth::user()->access_level_id == 3){
			return redirect()->action('HomeController@index');	
		}
				
		$request = Request::create('/api/accessLevels', 'GET');
		$response = Route::dispatch($request);
		$rawAccessLevel = json_decode($response->getOriginalContent());
		
		$array = [];
		
		foreach($rawAccessLevel as $value)   
		{
			$accessLevel = new accessLevel();
			$accessLevel->fill( get_object_vars($value) );
        $array = array_add($rawAccessLevel, $accessLevel->id, $accessLevel->name);
		}
		
		$req = Request::create('/api/shops', 'GET');
		$res = Route::dispatch($req);
		$rawShops = json_decode($res->getOriginalContent());
		
		$shopArray = [];
		foreach($rawShops as $value)   
		{
		$shop = new shop();
		$shop->fill( get_object_vars($value) );
        $shopArray = array_add($rawShops, $shop->id, $shop->name);
		}

		return view('auth/register')
		->with("accessLevels", $array)
		->with("shops", $shopArray);
	}
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

		if($data['shop'] == 0){
			$shop = null;
		}else{
			$shop = $data['shop'];
		}
	
        return User::create([
			'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
			'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'shop_id' => (Auth::user()->access_level_id == 1 ? $shop : Auth::user()->shop_id),
			'access_level_id' => (Auth::user()->access_level_id == 1 ? $data['accessLevel'] : 3),
			]);
    }
	
	public function register(Request $request)
	{
		return redirect()->action('AccountController@index');
	}
}
