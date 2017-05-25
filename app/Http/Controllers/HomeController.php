<?php

namespace App\Http\Controllers;

use Auth;
use App\visitStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::user()->shop_id == null){
			$request = Request::create('/api/visitStatistics', 'GET');
			$response = Route::dispatch($request);
			$rawVisitStatistic = json_decode($response->getOriginalContent());
			
			$array = [];
			
			foreach($rawVisitStatistic as $value)   
			{
				$visitStatistic = new visitStatistic();
				$visitStatistic->fill( get_object_vars($value) );
				// if(Auth::user()->shop_id == null || Auth::user()->shop_id == $visitStatistic->shop_id){
					// $array = array_add($rawVisitStatistic, $visitStatistic->id, $visitStatistic->shop_id);
				// }
					array_push($array, $value);		
			}
		}else{
			$request = Request::create('/api/visitStatistics', 'GET');
			$response = Route::dispatch($request);
			$rawVisitStatistic = json_decode($response->getOriginalContent());
			
			$array = [];
			
			foreach($rawVisitStatistic as $value)   
			{
				$visitStatistic = new visitStatistic();
				$visitStatistic->fill( get_object_vars($value) );
				// if(Auth::user()->shop_id == null || Auth::user()->shop_id == $visitStatistic->shop_id){
					// $array = array_add($rawVisitStatistic, $visitStatistic->id, $visitStatistic->shop_id);
				// }
				if($value->shop_id == Auth::user()->shop_id){
					array_push($array, $value);			
				}
			}			
		}

		
        return view('home')
		->with("visitStatistic", $array);
    }
}
