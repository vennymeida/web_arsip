@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Edit Kategori Surat</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kategori Surat</h2>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Edit Kategori Surat</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id">ID Kategori (Auto Increment)</label>
                                    <input type="text" name="id" class="form-control" id="id" value="{{ $kategori->id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                                    @error('nama_kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan">{{ old('keterangan', $kategori->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
@endpush

@push('customStyle')
@endpush
