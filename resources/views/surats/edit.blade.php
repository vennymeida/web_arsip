@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Surat</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Arsip Surat >> Edit</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Edit File Surat berformat PDF</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('surat.update', $surat->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" placeholder="Masukkan Nomor Surat">
                            @error('nomor_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori Surat</label>
                            <select class="form-control select2 @error('kategori_surat') is-invalid @enderror"
                                name="kategori_surat" data-id="select-kategori" id="kategori_surat">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategories as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $surat->kategori_surat ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ old('judul', $surat->judul) }}" placeholder="Masukkan Judul Surat">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_surat">File Surat (PDF)</label>
                            <input type="file" class="form-control-file @error('file_surat') is-invalid @enderror" id="file_surat" name="file_surat" accept=".pdf">
                            @error('file_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if ($surat->file_surat)
                                <p>Current File: <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank">{{ $surat->file_surat }}</a></p>
                            @endif
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('surat.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('customStyle')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
