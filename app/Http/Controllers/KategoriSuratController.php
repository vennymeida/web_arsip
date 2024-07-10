<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriSuratRequest;
use App\Http\Requests\UpdateKategoriSuratRequest;

class KategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = KategoriSurat::query();

        if ($request->has('nama_kategori')) {
            $search = $request->input('nama_kategori');
            $query->where('nama_kategori', 'like', '%' . $search . '%');
        }

        $kategoriSurats = $query->paginate(10);
        return view('kategori_surat.index', compact('kategoriSurats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nextId = KategoriSurat::max('id') + 1;
        return view('kategori_surat.create', compact('nextId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriSuratRequest $request)
    {
        KategoriSurat::create($request->validated());
        return redirect()->route('kategori.index')->with('success', 'Kategori Surat Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriSurat $kategori)
    {
        //
    }

    public function edit(KategoriSurat $kategori)
    {
        return view('kategori_surat.edit', compact('kategori'));
    }

    public function update(UpdateKategoriSuratRequest $request, KategoriSurat $kategori)
    {
        $kategori->update($request->validated());
        return redirect()->route('kategori.index')->with('success', 'Kategori Surat Berhasil Diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriSurat $kategori)
    {
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Data Kategori Surat berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('kategori.index')->with('success', 'Data Kategori Surat berhasil dihapus.');
        }
    }
}
