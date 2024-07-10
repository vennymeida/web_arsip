@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Arsip Surat</h1>

        </div>
        <div class="section-body">
            <h2 class="section-title">Arsip Surat</h2>
            <h2 class="section-title">Berikut ini adalah surat - surat yang telah terbit dan diarsipkan</h2>
            <h2 class="section-title">Klik Lihat Pada Kolom Aksi Untuk Menampilkan</h2>

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
                                <form id="search" method="GET" action="{{ route('surat.index') }}">
                                    <div class="form-row text-center">
                                        <div class="form-group col-md-10">
                                            <input type="text" name="judul" class="form-control" id="judul"
                                                placeholder="Cari Surat...." value="{{ app('request')->input('judul') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="submit-button" class="btn btn-primary mr-1"
                                                type="submit">Cari</button>
                                            <a id="reset-button" class="btn btn-secondary"
                                                href="{{ route('surat.index') }}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Nomor Surat</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Waktu Pengarsipan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        @if ($surats->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">Data tidak tersedia</td>
                                            </tr>
                                        @else
                                        @foreach ($surats as $key => $surat)
                                            <tr>
                                                <td>{{ ($surats->currentPage() - 1) * $surats->perPage() + $key + 1 }}</td>
                                                <td>{{ $surat->nomor_surat }}</td>
                                                <td>{{ $surat->kategoriSurat->nama_kategori }}</td>
                                                <td>{{ $surat->judul }}</td>
                                                <td>{{ $surat->waktu_pengarsipan }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('surat.show', $surat->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i class="fas fa-eye"></i>
                                                            Lihat</a>
                                                        <form action="{{ route('surat.destroy', $surat->id) }}"
                                                            method="POST" class="ml-2" id="del-<?= $surat->id ?>">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="submit" id="#submit"
                                                                class="btn btn-sm btn-danger btn-icon "
                                                                data-confirm="Hapus Surat ?|Apakah Anda Yakin Untuk Menghapus Arsip Surat Ini ?"
                                                                data-confirm-yes="submitDel(<?= $surat->id ?>)"
                                                                data-id="del-{{ $surat->id }}">
                                                                <i class="fas fa-times"> </i> Hapus </button>
                                                        </form>
                                                        <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-sm btn-warning btn-icon ml-2">
                                                            <i class="fas fa-download"></i> Unduh
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('surat.create') }}">Arsipkan
                                    Surat</a>
                                <div class="d-flex justify-content-center">
                                    {{ $surats->withQueryString()->links() }}
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
