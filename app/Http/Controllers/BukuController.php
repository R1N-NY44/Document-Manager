<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KatBuku;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function list()
    {
        $buku = Buku::with('kategori_buku')->latest()->get();
        return DataTables::of($buku)
            ->addColumn('file_buku', function ($row) {
                return "<div class='text-center'><a href='" . asset('storage/' . $row->file_buku) . "'><u><i data-feather='paperclip' class='mr-50'></i>Lihat Dokumen</u></a></div>";
            })
            ->addColumn('action', function ($row) {
                return "<div class='text-center'><a href='" . route('buku.store', $row->id_buku) . "'><button title='Edit' class='btn text-primary p-0 pr-50'><i data-feather='edit' class='font-medium-4'></i></button></a><button title='Delete' type='button' class='delete-data btn p-0' data-id='" . $row->id_buku . "' data-url='" . url('bangkes/buku') . "'><i data-feather='trash' class='font-medium-4 text-danger'></i></button></div>";
            })
            ->rawColumns(['file_buku', 'action'])
            ->toJson();
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
        try {
            $requestData = $request->validated();

            // Proses file yang diunggah
            if ($request->hasFile('file_buku')) {
                $file_buku = $request->file('file_buku')->store('buku');
                $requestData['file_buku'] = $file_buku;

                // Proses cover buku (misalnya, membuat thumbnail)
                $buku_path = Storage::path($file_buku);
                $pdf = new Pdf($buku_path);
                $pdf->saveImage(public_path('cover_buku') . '/' . basename($file_buku) . '.jpeg');
            }

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

    // public function store(BukuRequest $request)
    // {
    //     /*=====[Menyimpan data buku]====*/
    //     try {
    //         $requestData = $request->validated();
    //         $file_buku = $request->file_buku->store('buku');
    //         $requestData['file_buku'] = $file_buku;

    //         $buku_path = Storage::path($file_buku);
    //         $pdf = new Pdf($buku_path);
    //         $pdf->saveImage(public_path('cover_buku') . '/' . basename($file_buku) . '.jpeg');

    //         Buku::create($requestData);

    //         return response()->json([
    //             'error' => false,
    //             'message' => 'Buku Created!',
    //             'url' => url('bangkes/buku')
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }

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
