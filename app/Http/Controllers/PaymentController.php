<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg_payment as RP;
use App\Models\Company;
use App\Mail\RegPayment;
use Paystack;

class PaymentController extends Controller
{
    /**
     * show the payment page
     * -- final registration stage
     */
    public function showPayment(Company $company)
    {
        if($company->reg_payment()->exists()) {
            return redirect('/')->with('reg_done', 'You have already made payment and have provided the required data. We will contact you shortly.');
        }
        else {
            $data = [
                'email' => auth()->user()->email,
                'company' => $company->id,
            ];

            return view('stage_four', $data);
        }        
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $paymentDetails = $paymentDetails['data'];

        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        
        if ($paymentDetails['status'] === 'success' && $paymentDetails['amount'] === 2000000) {
            $pay = new RP;
            $pay->company_id = $paymentDetails['metadata']['company_id'];
            $pay->amount = $paymentDetails['amount'];
            $pay->reference = $paymentDetails['reference'];
            $pay->save();
            
            \Mail::to(auth()->user())->send(new RegPayment(auth()->user()->full_name));
            return redirect('/')->with('reg_done', 'Registration payment was successfull and all data provided have been saved. We will contact you shortly.');
        }
        else {
            return redirect('/')->with('reg_done', 'Unfortunately, your payment was not successful. <br> '. $paymentDetails['gateway_response']);
        }

        // TODO: reg payment route
    }
}
