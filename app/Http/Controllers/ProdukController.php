<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return $produk;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$produk =
        Produk::create([
            'judul_pendek' => $request->judul_pendek,
            'slug' => $request->slug,
            'judul_panjang' => $request->judul_panjang,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'harga' => $request->harga,
            'satuan' => $request->satuan
        ]);

        // collect($request->fasilitas)->each(function ($fasilitas) use ($produk) {
        //     Fasilitas::create([
        //         'produk_id' => $produk->id,
        //         'keterangan' => $fasilitas['keterangan'],
        //     ]);
        // });

        return response()->json([
            'message' => 'ok'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json([
            'message' => 'ok, berhasil di musnahkan!'
        ], 202);
    }
}
