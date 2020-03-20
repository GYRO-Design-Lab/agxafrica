<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class TradeController extends Controller
{
    public function investments(Company $company)
    {
        // $data['trade_investments'] = $company->trade_investments()->get();
        $data['trade_investments'] = Trade::whereBuyerId($company->id)
                                            ->with('tradeable')
                                            ->get();
        return $data;
    }

    public function sales(Company $company)
    {
        $data['trade_sales'] = $company->trade_sales()->get();
        return $data;
    }
}
