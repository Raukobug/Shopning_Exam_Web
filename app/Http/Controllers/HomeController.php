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

				if($value->shop_id == Auth::user()->shop_id){
					array_push($array, $value);			
				}
			}			
		}

		
		$array = array_where($array, function ($value, $key) {
			$lastWeek = date('Y-m-d', strtotime(date("Y-m-d", time() - 604800)));
			$Tomorrow = date('Y-m-d', strtotime(date("Y-m-d", time() + 86400)));
			$thisDate =date('Y-m-d', strtotime($value->date));
			return (($thisDate > $lastWeek) && ($thisDate < $Tomorrow));
		});
		
		$visits = "";
		$uniq = "";
		$names = "";
		
		foreach ($array as $v){
			if (isset($visit_count[$v->date])) {
				$visit_count[$v->date] += $v->visit_count;
				$unique_visit_count[$v->date] += $v->unique_visit_count;
			}else{
				$visit_count[$v->date] = $v->visit_count;	
				$unique_visit_count[$v->date] = $v->unique_visit_count;
			}		
		}
			
		foreach($unique_visit_count as $key => $number){
			$names .= "'".$key."',";
			$uniq .= $number.",";
			$visits .= $visit_count[$key].",";
		}
		
        return view('home')
		->with("visitStatistic", $array)
		->with("names", $names)
		->with("vc", $visits)
		->with("uvc", $uniq);
    }
}
