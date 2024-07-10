<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\KatBuku;
use Illuminate\Http\Request;

class KatBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*=====[Mengambil semua data kategori buku]=====*/
        try {
            $kat_buku = KatBuku::all();
            return response()->json([
                'error' => false,
                'message' => 'Data Kategori Buku',
                'data' => $kat_buku
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KatBuku $katBuku)
    {
        /*=====[Mengambil data buku berdasarkan kategori buku]=====*/
        try {
            $buku = Buku::with('kategori_buku')->findOrFail($katBuku->id_kat_buku)->get();
            return response()->json([
                'error' => false,
                'message' => 'Data Buku',
                'data' => $buku
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KatBuku $katBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KatBuku $katBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KatBuku $katBuku)
    {
        //
    }
}
