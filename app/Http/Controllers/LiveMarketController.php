<?php

namespace App\Http\Controllers;

use App\Models\LiveMarket;
use App\Models\Warehouse;
use App\Http\Requests\LiveMarketRequest as LMR;
use Illuminate\Http\Request;

class LiveMarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_warehouse', ['only' => ['store']]);
        // $this->middleware('commodity_owner', ['except' => ['index', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Warehouse $warehouse)
    {
        $data['live_commodities'] = $warehouse->live_commodities()->get();
        return $data;
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
    public function store(LMR $request, Warehouse $warehouse)
    {
        $company = $warehouse->company()->first();
        $photo = $request->photo->storeAs('warehouses/'.$company->slug.'/'.$warehouse->id.'/live_commodities', $request->photo->getClientOriginalName());
        $quantity = [$request->quantity, $request->unit];

        $live_commodity = new LiveMarket;
        $live_commodity->warehouse_id = $warehouse->id;
        $live_commodity->commodity = $request->commodity;
        $live_commodity->specification = $request->specification;
        $live_commodity->location = $request->location;
        $live_commodity->quantity = $quantity;
        $live_commodity->price = $request->price;
        $live_commodity->photo = $photo;

        $warehouse->live_commodities()->save($live_commodity);
        return redirect()->back()->with('status', 'Live commodity published successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiveMarket  $liveMarket
     * @return \Illuminate\Http\Response
     */
    public function show(LiveMarket $liveMarket)
    {
        $data['live_commodity'] = $liveMarket;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveMarket  $liveMarket
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveMarket $liveMarket)
    {
        $data['live_commodity'] = $liveMarket;
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveMarket  $liveMarket
     * @return \Illuminate\Http\Response
     */
    public function update(LMR $request, LiveMarket $liveMarket)
    {
        $quantity = [$request->quantity, $request->unit];
        
        $liveMarket->specification = $request->specification;
        $liveMarket->location = $request->location;
        $liveMarket->quantity = $quantity;
        $liveMarket->price = $request->price;
        $liveMarket->save();
        
        return redirect()->back()->with('status', 'Live commodity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveMarket  $liveMarket
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveMarket $liveMarket)
    {
        $liveMarket->delete();
        return redirect()->back()->with('status', 'Live commodity deleted successfully.');
    }
}
