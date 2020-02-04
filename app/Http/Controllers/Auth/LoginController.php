<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Company;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
        $slug = $this->company_slug();
        $company = Company::where('slug', $slug)->first();

        if ($company->cac_reg) {
            if ($company->reg_documents()->exists()) {
                if($company->reg_payment()->exists()) {
                    \Session::flash('reg_done', 'You have completed the registration/verification process. We will contact you shortly.');
                    return '/';
                }

                \Session::flash('status', 'This is the final stage. Please go ahead and make the registration payment, to complete the registration/verification process.');
                return '/payment/'.$slug;
            }
            return '/companies/'.$slug.'/reg_documents';
        }

        return '/companies/'.$slug.'/edit';
    }
}
