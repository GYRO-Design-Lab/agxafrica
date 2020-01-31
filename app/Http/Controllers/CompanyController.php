<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Company;
use App\Http\Requests\CompanyInfo;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
    public function store(Request $request)
    {
        echo "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyInfo $request, Company $company)
    {
        $company->cac_reg = $request->cac_reg;
        $company->nepc_reg = $request->nepc_reg;
        $company->contact_person = $request->contact_person;
        $company->contact_phone = $request->contact_phone;
        $company->contact_email = $request->contact_email;
        $company->contact_position = $request->contact_position;
        $company->commodities = $request->commodities;
        $company->save();

        Session::flash("url", "/companies/".$company->slug."/reg_documents");
        return redirect('/companies/'.$company->slug.'/reg_documents/create')->with('status', 'Company verification information stored successfully. Please Upload the required documents');
        // return redirect('/stage_three')->with('status', 'Company verification information stored successfully. Please Upload the required documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
