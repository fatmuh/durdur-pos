<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function grafik()
    {
        $biaya = Pengeluaran::select(DB::raw("CAST(SUM(biaya) as int) as biaya"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('biaya');

        $bulan_pengeluaran = Pengeluaran::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        $total_pembayaran = Pemasukan::select(DB::raw("CAST(SUM(total_pembayaran) as int) as total_pembayaran"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_pembayaran');

        $bulan_pemasukan = Pemasukan::select(DB::raw("MONTHNAME(created_at) as bulan_pemasukan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan_pemasukan');

        return view('home', compact('biaya','bulan_pengeluaran','total_pembayaran','bulan_pemasukan'));
    }
}
