<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public $product_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPemasukan = Pemasukan::all();
        $dataProduk = Produk::all();
        $sum = Pemasukan::sum('total_pembayaran');
        return view('pages.pemasukan.index', compact('dataPemasukan', 'dataProduk', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk' => 'required',
            'jumlah_pembelian' => 'required',
            'uang_terima' => 'required',
        ],

        [

        ],

    [
        'id_produk' => 'required',
        'jumlah_pembelian' => 'required',
        'uang_terima' => 'required',
    ]);

        $produk = Produk::find($request->id_produk);
        if($produk->quantity < $request->jumlah_pembelian){
            return redirect('pemasukan')->with('toast_error', 'Stock tidak tersedia');
        } else {
            $transaction = Pemasukan::create($validatedData);
            $produk->update([
                'quantity' => $produk->quantity - $transaction->jumlah_pembelian,
            ]);
            $transaction->total_pembayaran = $produk->harga * $transaction->jumlah_pembelian;
            $transaction->uang_kembali = $transaction->uang_terima - $transaction->total_pembayaran;
            $transaction->save();
            return redirect('pemasukan')->with('toast_success', 'Data Berhasil Tersimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pemasukan::findOrFail($id);
        $item->delete();
        return redirect('pemasukan')->with('toast_success', 'Pemasukan Deleted Successfully!');
    }
}
