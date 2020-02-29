<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\MarketRequest as MR;

class MarketController extends Controller
{
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

        $commodity = new Market;
        $commodity->company_id = $company->id;
        $commodity->commodity = $request->commodity;
        $commodity->specification = $request->specification;
        $commodity->location = $request->location;
        $commodity->quantity = $request->quantity;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        //
    }
}
