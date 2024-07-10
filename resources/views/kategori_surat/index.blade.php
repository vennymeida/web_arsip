@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Kategori Surat</h1>

        </div>
        <div class="section-body">
            <h2 class="section-title">Kategori Surat</h2>
            <h2 class="section-title">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat</h2>
            <h2 class="section-title">Klik Tambah Pada Kolom Aksi Untuk Menampilkan</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Arsip Surat</h4>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3">
                                <form id="search-form" method="GET" action="{{ route('kategori.index') }}">
                                    <div class="form-row text-center">
                                        <div class="form-group col-md-10">
                                            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                                placeholder="Cari Surat...." value="{{ app('request')->input('nama_kategori') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="submit-button" class="btn btn-primary mr-1" type="submit">Cari</button>
                                            <a id="reset-button" class="btn btn-secondary" href="{{ route('kategori.index') }}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Nama Kategori</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        @if ($kategoriSurats->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-center">Data tidak tersedia</td>
                                            </tr>
                                        @else
                                            @foreach ($kategoriSurats as $key => $kategoriSurat)
                                                <tr>
                                                    <td>{{ ($kategoriSurats->currentPage() - 1) * $kategoriSurats->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $kategoriSurat->nama_kategori }}</td>
                                                    <td>{{ $kategoriSurat->keterangan }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('kategori.edit', $kategoriSurat->id) }}"
                                                                class="btn btn-sm btn-warning btn-icon ml-2">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form
                                                                action="{{ route('kategori.destroy', $kategoriSurat->id) }}"
                                                                method="POST" class="ml-2"
                                                                id="del-{{ $kategoriSurat->id }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger btn-icon"
                                                                    data-confirm="Hapus Kategori? | Apakah Anda Yakin Untuk Menghapus Kategori Ini?"
                                                                    data-confirm-yes="submitDel({{ $kategoriSurat->id }})"
                                                                    data-id="del-{{ $kategoriSurat->id }}">
                                                                    <i class="fas fa-times"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('kategori.create') }}">Tambah Kategori Baru</a>
                                <div class="d-flex justify-content-center">
                                    {{ $kategoriSurats->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });

        });

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
@endpush

@push('customStyle')
@endpush
