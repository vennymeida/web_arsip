<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\KategoriSurat;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $surats = Surat::with('kategoriSurat')
        ->when($request->input('judul'), function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
        ->paginate(10);
        return view('surats.index', compact('surats'));
    }

    public function create()
    {
        $kategories = KategoriSurat::all();
        return view('surats.create')->with(['kategories' => $kategories]);
    }

    public function store(StoreSuratRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $filePath = $file->store('surat_files', 'public'); // Store file in 'storage/app/public/surat_files'
        }

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_surat' => $request->kategori_surat,
            'judul' => $request->judul,
            'file_surat' => $filePath,
        ]);

        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }


    public function show(Surat $surat)
    {
        // Menampilkan detail surat
        return view('surats.show', compact('surat'));
    }


    public function edit(Surat $surat)
    {
        $kategories = KategoriSurat::all();
        // Menampilkan form untuk mengedit surat
        return view('surats.edit', compact('surat', 'kategories'));
    }

    public function update(UpdateSuratRequest $request, Surat $surat)
    {
        // Validasi data yang diterima dari form
    $validatedData = $request->validated();

    // Handle file upload jika ada
    if ($request->hasFile('file_surat')) {
        // Hapus file lama jika ada
        if ($surat->file_surat) {
            Storage::delete($surat->file_surat);
        }
        // Upload file baru
        $validatedData['file_surat'] = $request->file('file_surat')->store('surat_files', 'public');
    }

    // Mengupdate surat dengan data yang telah divalidasi
    $surat->update($validatedData);

    // Mengarahkan kembali ke halaman index dengan pesan sukses
    return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function download(Surat $surat)
    {
        if ($surat->file_surat) {
            $filePath = 'public/' . $surat->file_surat;

            if (Storage::exists($filePath)) {
                return Storage::download($filePath, $surat->nomor_surat . '.pdf');
            } else {
                return redirect()->route('surat.index')->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->route('surat.index')->with('error', 'Surat tidak memiliki file.');
        }
    }

    public function destroy(Surat $surat)
    {
        try {
            $surat->delete();
            return redirect()->route('surat.index')->with('success', 'Data Surat berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('surat.index')->with('success', 'Data Kelurahan dan Kecamatan berhasil dihapus.');
        }
    }
}
