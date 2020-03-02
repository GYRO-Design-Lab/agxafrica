<?php

namespace App\Http\Middleware\Custom;

use Closure;

class VerifiedWarehouse
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
        $warehouse = $request->warehouse;
        if(!$warehouse->verified) {
            return redirect()->back()->with('status', 'Only a verified warehouse can use this feature.');
            // return response()->json(['status' => 'Only verified companies/merchants can publish commodities.']);
        }
        return $next($request);
    }
}
