<?php

namespace App\Http\Controllers;

use Auth;
use App\visitStatistic;
use App\item;
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
		$requestVS = Request::create('/api/visitStatistics', 'GET');
		$responseVS = Route::dispatch($requestVS);
		$rawVisitStatistic = json_decode($responseVS->getOriginalContent());
			
		$arrayVS = [];
		if(Auth::user()->shop_id == null){
			foreach($rawVisitStatistic as $value)   
			{
				$visitStatistic = new visitStatistic();
				$visitStatistic->fill( get_object_vars($value) );
				
				array_push($arrayVS, $value);		
			}
		}else{
			foreach($rawVisitStatistic as $value)   
			{
				$visitStatistic = new visitStatistic();
				$visitStatistic->fill( get_object_vars($value) );

				if($value->shop_id == Auth::user()->shop_id){
					array_push($arrayVS, $value);			
				}
			}			
		}
		
		$arrayVS = array_where($arrayVS, function ($value, $key) {
			$lastWeek = date('Y-m-d', strtotime(date("Y-m-d", time() - 604800)));
			$Tomorrow = date('Y-m-d', strtotime(date("Y-m-d", time() + 86400)));
			$thisDate =date('Y-m-d', strtotime($value->date));
			return (($thisDate > $lastWeek) && ($thisDate < $Tomorrow));
		});
		
		$visits = "";
		$uniq = "";
		$names = "";
		
		foreach ($arrayVS as $v){
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
		
		/// Get info for purchase.
		
		$requestItems = Request::create('/api/items', 'GET');
		$responseItems = Route::dispatch($requestItems);
		$rawItems = json_decode($responseItems->getOriginalContent());
		
		$arrayItems = [];
		if(Auth::user()->shop_id == null){
			foreach($rawItems as $value)   
			{
				$item = new item();
				$item->fill( get_object_vars($value) );
				
				array_push($arrayItems, $value);		
			}
		}else{
			foreach($rawItems as $value)   
			{
				$item = new item();
				$item->fill( get_object_vars($value) );

				if($value->shop_id == Auth::user()->shop_id){
					array_push($arrayItems, $value);			
				}
			}			
		}
		
		usort($arrayItems, array($this, "cmp"));
		
		$pieData = array
		  (
		  array(0,"#f56954","#f56954",""),
		  array(0,"#00a65a","#00a65a",""),
		  array(0,"#f39c12","#f39c12",""),
		  array(0,"#00c0ef","#00c0ef",""),
		  array(0,"#3c8dbc","#3c8dbc",""),
		  array(0,"#d2d6de","#d2d6de","")
		  );
				
		for ($i = 0; $i < 6; $i++){
			if(array_key_exists($i,$arrayItems)){
				$pieData[$i][0] = $arrayItems[$i]->sold;
				$pieData[$i][3] = $arrayItems[$i]->product->name;
			}			
		}
		
		$pieDataString = "";
		
		foreach ($pieData as $item){
			if ($item[3] != ""){
				$pieDataString .= '{ value: '.$item[0].', color: "'.$item[1].'", highlight: "'.$item[2].'", label: "'.$item[3].'" }, ';
			}			
		}

        return view('home')
		->with("names", $names)
		->with("vc", $visits)
		->with("uvc", $uniq)
		->with("pieData", $pieDataString);
    }
	
	public function cmp($a, $b)
	{
		return  $b->sold - $a->sold;
	}
}
