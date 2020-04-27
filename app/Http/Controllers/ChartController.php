<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\reportChart;
use App\Sales;
use DB;
use App\Services\CartService;

class ChartController extends Controller
{
    protected $chartService;


    public function __construct(ChartService $chartService){
        $this->chartService = $chartService;
    }
    public function index()
    {
        $chart = $this->cartService->index();
        $report = Sales::all();

        DB::table('sales')->get();
        $total_coffee = DB::table('sales')->where('name','coffee')->sum('sale');
        $total_hamburger = DB::table('sales')->where('name','hamburger')->sum('sale');
        $total_drink = DB::table('sales')->where('name','drink')->sum('sale');
        
        $chart = new reportChart;
        $chart->labels(['Coffee', 'Hamburger', 'Drink']);
        $chart->dataset('Products', 'bar', [$total_coffee,$total_hamburger,$total_drink]);
        return view('report', compact('report', 'chart'));
    }
}
