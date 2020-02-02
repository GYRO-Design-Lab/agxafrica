<?php

namespace App\Http\Controllers;

use App\Models\Reg_document;
use App\Models\Company;
use App\Http\Requests\RegDocument as RD;
use Illuminate\Http\Request;

class RegDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['slug'] = $this->company_slug();
        return view('stage_three', $data);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('stage_three');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RD $request, Company $company)
    {
        $cac_certificate = $request->cac_certificate->storeAs('reg_documents/'.$company->slug, $request->cac_certificate->getClientOriginalName());
        $nepc_certificate = $request->nepc_certificate->storeAs('reg_documents/'.$company->slug, $request->nepc_certificate->getClientOriginalName());
        $cac_1_1 = $request->cac_1_1->storeAs('reg_documents/'.$company->slug, $request->cac_1_1->getClientOriginalName());
        $memart = $request->memart->storeAs('reg_documents/'.$company->slug, $request->memart->getClientOriginalName());

        if($request->has('others')) {
            // 
        }

        // $reg_document = new
        $company->reg_documents()->createMany(
            [
                [
                    'company_id' => $company->id,
                    'type' => 'cac_certificate',
                    'file' => $cac_certificate,
                ],
                [
                    'company_id' => $company->id,
                    'type' => 'nepc_certificate',
                    'file' => $nepc_certificate,
                ],
                [
                    'company_id' => $company->id,
                    'type' => 'cac_1_1',
                    'file' => $cac_1_1,
                ],
                [
                    'company_id' => $company->id,
                    'type' => 'memart',
                    'file' => $memart,
                ],
            ]
        );
        // $company->reg_documents()->save($reg_document);

        return redirect('/')->with('reg_done', 'Registration Documents Uploaded Successfully. We will contact you shortly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reg_document  $reg_document
     * @return \Illuminate\Http\Response
     */
    public function show(Reg_document $reg_document)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reg_document  $reg_document
     * @return \Illuminate\Http\Response
     */
    public function edit(Reg_document $reg_document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reg_document  $reg_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reg_document $reg_document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reg_document  $reg_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reg_document $reg_document)
    {
        //
    }
}
