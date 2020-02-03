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
    public function index(Company $company)
    {
        $data['slug'] = $company->slug;
        $data['update'] = false;

        if($company->reg_documents()->exists()) {
            $data['update'] = true;
            \Session::flash('status', 'Please note that you have already completed this stage, but feel free to update any document you have previously provided or add more.');
            return view('stage_three', $data);  
        }
        else {
            return view('stage_three', $data);  
        }          
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
        $cac_certificate = $request->cac_certificate->storeAs('reg_documents/'.$company->slug, 'cac_certificate.'.$request->cac_certificate->extension());
        $nepc_certificate = $request->nepc_certificate->storeAs('reg_documents/'.$company->slug, 'nepc_certificate.'.$request->nepc_certificate->extension());
        $cac_1_1 = $request->cac_1_1->storeAs('reg_documents/'.$company->slug, 'cac_1_1.'.$request->cac_1_1->extension());
        $memart = $request->memart->storeAs('reg_documents/'.$company->slug, 'memart.'.$request->memart->extension());

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

        if($request->has('others')) {
            $n = 1;
            foreach ($request->others as $x) {
                $other = $x->storeAs('reg_documents/'.$company->slug, 'other_doc_'.$n.'.'.$x->extension());

                $company->reg_documents()->create([
                    'company_id' => $company->id,
                    'type' => 'other',
                    'file' => $other,
                ]);
                $n++;
            }
        }

        return redirect('/payment/'.$company->slug)->with('status', 'You have provided the required information/documents. <br>Please go ahead and make the registration payment, to complete the registration/verification process.');
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
