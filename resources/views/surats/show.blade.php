@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Arsip Surat >> Lihat</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Nomor:</strong> {{ $surat->nomor_surat }}</p>
                        <p><strong>Kategori:</strong> {{ $surat->kategoriSurat->nama_kategori }}</p>
                        <p><strong>Judul:</strong> {{ $surat->judul }}</p>
                        <p><strong>Waktu Unggah:</strong> {{ $surat->waktu_pengarsipan }}</p>

                        <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                            <iframe src="{{ asset('storage/' . $surat->file_surat) }}" style="width:100%; height:500px;"
                                frameborder="0"></iframe>
                        </div>

                        <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                            << Kembali</a>
                                <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-primary">Unduh</a>
                                <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-warning">Edit/Ganti File</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
