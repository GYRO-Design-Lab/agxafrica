<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\MarketRequest as MR;

class MarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_company', ['only' => ['store']]);
        $this->middleware('commodity_owner', ['except' => ['index', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MR $request, Company $company)
    {
        $photo = $request->photo->storeAs('market/'.$company->slug.'/commodities', $request->photo->getClientOriginalName());
        $quantity = [$request->quantity, $request->unit];

        $commodity = new Market;
        $commodity->company_id = $company->id;
        $commodity->commodity = $request->commodity;
        $commodity->specification = $request->specification;
        $commodity->location = $request->location;
        $commodity->quantity = $quantity;
        $commodity->price = $request->price;
        $commodity->trade_type = $request->trade_type;
        $commodity->photo = $photo;

        $company->commodities()->save($commodity);
        return redirect()->back()->with('status', 'Commodity published successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        $data['commodity'] = $market;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        $data['commodity'] = $market;
        return $data;
    }

    // TODO: update validator
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        $quantity = [$request->quantity, $request->unit];

        $market->specification = $request->specification;
        $market->location = $request->location;
        $market->quantity = $quantity;
        $market->price = $request->price;
        $market->save();

        return redirect()->back()->with('status', 'Commodity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        $market->delete();
        return redirect()->back()->with('status', 'Commodity deleted successfully.');
    }
}
