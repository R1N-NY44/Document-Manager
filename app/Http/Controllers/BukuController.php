<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KatBuku;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
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
        /*=====[Mengambil semua data buku====*/
        try {
            $buku = Buku::with('kategori_buku')->get();
            return response()->json([
                'data' => $buku
            ], 200);
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
    public function store(BukuRequest $request)
    {
        /*=====[Menyimpan data buku]====*/
        try {
            $requestData = $request->validated();
            $file_buku = $request->file_buku->store('buku');
            $requestData['file_buku'] = $file_buku;

            $buku_path = Storage::path($file_buku);
            $pdf = new Pdf($buku_path);
            $pdf->saveImage(public_path('cover_buku') . '/' . basename($file_buku) . '.jpeg');

            Buku::create($requestData);

            return response()->json([
                'error' => false,
                'message' => 'Buku Created!',
                'url' => url('bangkes/buku')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($buku)
    {
        /*=====[Menampilkan data buku, berdasarkan id buku]=====*/
        try {
            $buku = Buku::with('kategori_buku')->findOrFail($buku);
            return response()->json([
                'error' => false,
                'message' => 'Data Buku',
                'data' => $buku
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'id' => $buku
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, Buku $buku)
    {
        try {
            $requestData = $request->validated();
            if ($request->file_buku != null) {
                $requestData['file_buku'] = $request->file_buku->store('buku');
                Storage::delete($buku->file_buku);
            }
            $buku->update($requestData);

            return response()->json([
                'error' => false,
                'message' => 'Buku Updated!',
                'url' => url('bangkes/buku')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        try {
            //$event_buku = EventBuku::where('id_buku', $buku->id_buku)->first();
            //if ($event_buku) throw new Exception("Cannot delete this data, please check jadwal sosialisasi first.");

            Storage::delete($buku->file_buku);
            $buku->delete();

            return response()->json([
                'error' => false,
                'message' => 'Buku Deleted!',
                'table' => '#buku'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
