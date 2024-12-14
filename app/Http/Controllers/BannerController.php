<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return $banner;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->garpu;
        //validasi
        $validation = Validator::make($request->all(), [
            'judul' => 'required|max:100|min:10',
            'subjudul' => 'required|max:200|min:10',
            'foto' => 'required',
            'posisi' => 'required|in:1,2,3,4',
            'status' => 'required|in:y,n'
        ], [
            'judul.required' => 'Silahkan masukkan judul',
            'judul.max' => 'Maksimal karakter 100',
            'judul.min' => 'Minimal karakter 10',
            'subjudul.required' => 'silahkan masukkan subjudul',
            'subjudul.max' => 'Maksimal karakter 200',
            'subjudul.min' => 'Minimal karakter 10',
            'foto.required' => 'silahkan upload foto',
            'posisi.required' => 'maaf posisi tidak valid',
            'posisi.in' => 'maaf posisi tidak valid',
            'status.required' => 'maaf status tidak valid',
            'status.in' => 'maaf status tidak valid'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        } else {
            Banner::create([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'foto' => $request->foto,
                'posisi' => $request->posisi,
                'status' => $request->status
            ]);
        }

        return response()->json([
            'message' => 'ok'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return $banner;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->update([
            'judul' => 'hero2',
            'subjudul' => 'hero2',
            'foto' => 'foto2',
            'posisi' => '2',
            'status' => 'y'
        ]);

        return response()->json([
            'message' => 'ok, berhasil di update !'
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json([
            'message' => 'ok, berhasil di musnahkan!'
        ], 202);
    }
}
