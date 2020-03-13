<?php

namespace App\Http\Controllers;

use App\Models\RFQ;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\RFQRequest as RR;

class RFQController extends Controller
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
    public function store(RR $request, Company $company)
    {
        $rfq = new RFQ;
        $rfq->company_id = $company->id;
        $rfq->commodity = $request->commodity;
        $rfq->category = $request->category;
        $rfq->specification  = $request->specification ;
        $rfq->delivery_location = $request->delivery_location;
        $rfq->quantity = $request->quantity;
        $rfq->price = $request->price;
        $rfq->expiry = $request->expiry;

        $company->rfqs()->save($rfq);
        return redirect()->back()->with('status', 'Your Request for Quote was successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function show(RFQ $rfq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function edit(RFQ $rfq)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RFQ $rfq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFQ $rfq)
    {
        //
    }
}
