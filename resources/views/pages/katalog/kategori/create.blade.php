@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Kategori</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            
            <hr class="mb-4">

            <div class="card app-card shadow-sm" style="padding: 10px 16px">
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ url('kategori') }}">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6 col-sm-12">
                                <label for="nama-kategori" class="form-label mb-3" style="text-align: right;"><b>Nama Kategori</b></label>
                                <input type="text" name="nama" class="form-control mb-2" placeholder="masukkan nama kategori" required>
                                <small class="mb-2">*Kategori produk untuk memudahkan pelanggan mencari produk anda</small>
                                <br>
                                <button type="submit" class="btn app-btn-primary mt-4">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            





















        </div>	
    </div>
</div>

@endsection