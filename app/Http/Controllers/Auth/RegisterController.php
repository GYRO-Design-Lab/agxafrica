<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Company;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'company_address' => ['required', 'string'],
            'commodities' => ['required', 'array'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make('agx-Secret'),
            'phone' => $data['phone'],            
        ]);

        $company = new Company;
        $company->user_id =  $user->id;
        $company->name =  $data['company_name'];
        $company->address =  $data['company_address'];
        $company->commodities =  $data['commodities'];
        $company->save();

        // Session::flash("status", "Thank you for registering on AGX Africa | Africa's largest online commodities market. Please fill out this form to verify your company.");
        // Session::flash("company_name", $company->name);
        // Session::flash("company_address", $company->address);
        // Session::flash("slug", $company->slug);
        // Session::flash("commodities", $company->commodities[0]);

        return $user;
    }
}
