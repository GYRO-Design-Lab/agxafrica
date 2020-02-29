<?php

namespace App\Http\Middleware\Custom;

use Closure;

class VerifiedCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $company = $request->company;
        if(!$company->verified) {
            return redirect()->back()->with('status', 'Only verified companies/merchants can publish commodities.');
            // return response()->json(['status' => 'Only verified companies/merchants can publish commodities.']);
        }
        return $next($request);
    }
}
