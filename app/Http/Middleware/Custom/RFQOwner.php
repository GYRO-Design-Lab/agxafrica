<?php

namespace App\Http\Middleware\custom;

use Closure;
use App\Models\Company;

class RFQOwner
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
        $company = Company::where('user_id', auth()->user()->id)
                            ->select('id')
                            ->first();

        if(!$request->rfq->company_id == $company['id']) {
           abort(401);
        }
        
        return $next($request);
    }
}
