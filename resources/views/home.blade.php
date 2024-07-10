@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">About the Application</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>About the Developer</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="profile-image">
                                    <img src="/assets/img/venny.jpg" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                {{-- <img alt="image" src="/assets/img/venny.jpg" class="rounded-circle mr-1"> --}}
                                <div class="profile-info">
                                    <span>Aplikasi ini dibuat oleh:</span>
                                    <span>Nama: Venny Meida Hersianty</span>
                                    <span>Prodi: D4 Teknik Informatika</span>
                                    <span>NIM: 2041720100</span>
                                    <span>Tanggal: 10 Juli 2024</span>
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
        // Any custom scripts for this page can go here
    </script>
@endpush

@push('customStyle')
    <style>
        .container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            background-color: #000;
            border-radius: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
        }
        .profile-info {
            font-size: 18px;
        }
        .profile-info span {
            display: block;
            margin-bottom: 5px;
        }
    </style>
@endpush
