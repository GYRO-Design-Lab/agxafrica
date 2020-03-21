<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\LiveMarket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('stage_one');
    }

    public function trading_index()
    {
        $data['sellers'] = Market::where('trade_type', 'sell')
                                ->select(\DB::raw("avg(price) as price, commodity"))
                                ->distinct()
                                ->groupBy('commodity')
                                ->get();

        $data['buyers'] = Market::where('trade_type', 'buy')
                                ->select(\DB::raw("avg(price) as price, commodity"))
                                ->distinct()
                                ->groupBy('commodity')
                                ->get();;

        $data['live_trades'] = LiveMarket::select('commodity','price')->get();
        $data['slug'] = $this->company_slug();

        return view('trading.index', $data);
    }
}
