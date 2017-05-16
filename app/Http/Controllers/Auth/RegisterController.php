<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\accessLevel;
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
		
		$request = Request::create('/api/accessLevels', 'GET');
		$response = Route::dispatch($request);
		$rawAccessLevel = json_decode($response->getOriginalContent());
		
		foreach($rawAccessLevel as $value)   
		{
			$accessLevel = new accessLevel();
			$accessLevel->fill( get_object_vars($value) );
        $array = array_add($rawAccessLevel, $accessLevel->id, $accessLevel->name);
		}
	
		
		return view('auth/register')
				->with("accessLevels", $array);
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
        return User::create([
			'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
			'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'shop_id' => 1,
			'access_level_id' => $data['accessLevel'],
			]);
    }
}
