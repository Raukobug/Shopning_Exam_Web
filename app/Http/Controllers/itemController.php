<?php

namespace App\Http\Controllers;

use App\item;
use App\shop;
use App\product;
use Illuminate\Http\Request;
use Auth;
use Session;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return item::with(['shop' => function($s) {
            $s->select('id','name');
        }
        , 'product' => function($p) {
            $p->select('id', 'name');
        }
        ])->get();
    }

	public function webIndex()
    {
		if(Session::get('shopId')){
			$User_Shop_Id = Session::get('shopId');
		}else{
			$User_Shop_Id  = Auth::user()->shop_id;
		}
		
        $wares = item::where('shop_id', $User_Shop_Id)->get();
        return view("item/List")
				->with("wares", $wares);
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createView()
    {
        return view("item/Create");
    }

	
	protected function create(Request $request)
    {
		
		if(Session::get('shopId')){
			$User_Shop_Id = Session::get('shopId');
		}else{
			$User_Shop_Id  = Auth::user()->shop_id;
		}

		 $p = product::where('name', '=', $request->input('name'))->first();
		 
		 if($p == null){
			 $product = new product;
			 $product->name = $request->input('name');
			 $product->save();
			 $p = $product;
		 }
		 
		Item::create([
			'product_id' => $p->id,
            'quantity' => $request->input('quantity'),
			'price' => $request->input('price'),
            'expirationdate' => $request->input('date'),
			'shop_id' => (Auth::user()->access_level_id == 1 ? $User_Shop_Id : Auth::user()->shop_id),
			]);
			
		return redirect('/wares');
    }
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new item;
        $item->product_id = $request->product_id;
        $item->shop_id = $request->shop_id;
        $item->quantity = $request->quantity;
        $item->sold = $request->sold;
        $item->expirationdate = $request->expirationdate;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->offer = $request->offer;
        $item->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item::find($id);
        $shop = shop::find($item->shop_id);
        $product = product::find($item->product_id);
        $item->shop_id = $shop;
        $item->product_id = $product;

        return $item->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::find($id);
		$item->discount = $item->discount == 0 ? $item->discount :(1-$item->discount/$item->price)*100;
        return view('item/Edit')->with('item', $item);
		//
    }
	
	public function updateFromView(Request $request, $id)
    {
        $item = item::find($id);
        $item->quantity = $request->quantity;	
		$item->price = $request->price;		
        $item->discount = $request->discount == 0 ? $request->discount : $item->price - (($item->price * $request->discount) / 100);
        $item->offer = $request->offer;
        $item->save();
		return redirect('/wares');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $item = item::find($id);
        //NEED FORM DATA HERE
        $item->product_id = 1;
        $item->shop_id = 1;
        $item->quantity = 50;
        $item->sold = 20;
        $item->expirationdate = date("Y/m/d");
        $item->price = 40;
        $item->discount = 10;
        $item->offer = 0;
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::find($id);
        $item->delete();
    }
	
	public function removeItem($id)
    {
        $item = item::find($id);
        $item->delete();
		return redirect('/wares');
    }
	
}
