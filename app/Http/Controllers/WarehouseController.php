<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Company;
use App\Http\Requests\WarehouseRequest as WR;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_company', ['only' => ['store']]);
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

    // TODO: email notification
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WR $request, Company $company)
    {
        $photo = $request->photo->storeAs('warehouses/'.$company->slug.'/identity', $request->photo->getClientOriginalName());

        $warehouse = new Warehouse;
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->manager = $request->manager;
        $warehouse->contact_person = $request->contact_person;
        $warehouse->email = $request->email;
        $warehouse->phone = $request->phone;
        $warehouse->size = $request->size;
        $warehouse->capacity = $request->capacity;
        $warehouse->photo = $photo;

        $company->warehouses()->save($warehouse);
        return redirect()->back()->with('status', 'Warehouse registered successfully. Please await verification.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(WR $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
