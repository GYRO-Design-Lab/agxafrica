<?php

namespace App\Http\Middleware\Custom;

use Closure;
use App\Models\Company;

class CommodityOwner
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

        if(!$request->market->company_id == $company['id']) {
            abort(401);
        }
        
        return $next($request);
    }
}
