<?php

namespace App\Http\Controllers;

use App\item;
use App\shop;
use App\product;
use Illuminate\Http\Request;

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
    public function edit(item $item)
    {
        //
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
        $item = account::find($id);
        $item->delete();
    }
}
