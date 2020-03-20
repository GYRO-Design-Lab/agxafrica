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
        $trades = Market::select('commodity','price','trade_type')->get();
        $data = [];

        foreach ($trades as $trade) {
            if($trade->trade_type == 'buy') {
                $data['buyers'][] = $trade;
            }
            else {
                $data['sellers'][] = $trade;
            }
        }

        $data['live_trades'] = LiveMarket::select('commodity','price')->get();
        $data['slug'] = $this->company_slug();

        return view('trading.index', $data);
    }
}
