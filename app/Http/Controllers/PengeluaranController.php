<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengeluaran::all();
        $sum = Pengeluaran::sum('biaya');
        return view('pages.pengeluaran.index')->with([
            'data' => $data,
            'sum' => $sum
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
            'jenis_pengeluaran' => 'required',
            'biaya' => 'required',
        ],

        [

        ],

    [
        'jenis_pengeluaran' => 'jenis pengeluaran',
        'biaya' => 'biaya',
    ]);

        Pengeluaran::create($validatedData);
        return redirect('pengeluaran')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Pengeluaran::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('pengeluaran')->with('toast_success', 'Pengeluaran Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pengeluaran::findOrFail($id);
        $item->delete();
        return redirect('pengeluaran')->with('toast_success', 'Pengeluaran Deleted Successfully!');
    }
}
