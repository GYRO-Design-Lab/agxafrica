<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Company;
use App\Http\Requests\CompanyInfo;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct() {
        // $this->middleware(['']);
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
    public function store(Request $request)
    {
        // 
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
        // check if the company is being updated for the first time
        if($company->cac_reg) {
            $data['message'] = "Please note that you have already completed this stage, but feel free to update any information you have previously provided.";
        }
        else {
            $data['message'] = "Your email has been verified successfully. Please fill out this form to verify your company.";
        }

        $data['company'] = $company;

        return view('stage_two', $data);
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
        $commodities = [];
        $c = $request->commodities;
        $x = $request->import_export;
        $q = $request->quantities;
        
        for ($i=0; $i < count($c) ; $i++) { 
            $commodities[$c[$i]] = [$x[$i], $q[$i]];
        }
        
        $company->cac_reg = $request->cac_reg;
        $company->nepc_reg = $request->nepc_reg;
        $company->contact_person = $request->contact_person;
        $company->contact_phone = $request->contact_phone;
        $company->contact_email = $request->contact_email;
        $company->contact_position = $request->contact_position;
        $company->commodities = $commodities;
        $company->save();

        return redirect('/companies/'.$company->slug.'/reg_documents')->with('status', 'Company verification information stored successfully. Please upload the required documents');
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
