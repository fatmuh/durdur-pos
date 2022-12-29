<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        return view('pages.produk.index')->with([
            'data' => $data,
        ]);
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
            'nama' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
        ],

        [

        ],

    [
        'nama' => 'nama produk',
        'quantity' => 'stok produk',
        'harga' => 'harga produk',
    ]);

        Produk::create($validatedData);
        return redirect('produk')->with('toast_success', 'Produk Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $item = Produk::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('produk')->with('toast_success', 'Product Updated Successfully!');
    }

    public function add_stock(Request $request, $id)
    {

        $item = Produk::findOrFail($id);
        $data = $request->except(['_token']);
        $data['quantity'] = $request->post('quantity') + $item->quantity;
        $item->update($data);
        return redirect('produk')->with('toast_success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Produk::findOrFail($id);
        $item->delete();
        return redirect('produk')->with('toast_success', 'Product Deleted Successfully!');
    }
}
