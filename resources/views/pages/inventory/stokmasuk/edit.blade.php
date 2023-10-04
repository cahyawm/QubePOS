@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card app-card shadow-sm mb-4">
                <div class="header" style="border-bottom: 0.1px solid #e7e9ed">
                    <div class="row g-3 align-items-center px-3 py-2">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="app-icon-holder icon-holder-mono">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
                                    <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <h6 class="mt-2">Edit Stok Masuk</h6>
                        </div>
                    </div>
                </div>
                <div class="app-card-body" style="padding: 10px 16px">
                    <form class="settings-form" method="POST" action="{{ url('stokmasuk/'.$model->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="row align-items-center">
                            <div class="col-6 col-xl-6 col-md-12 col-sm-12">

                                {{-- input nama staff --}}
                                <div class="mb-3">
                                    <label for="nama_staff" class="form-label mb-3" style="text-align: right;"><b>Nama Staff</b></label>
                                    <input type="text" name="nama_staff" class="form-control mb-2" placeholder="masukkan nama staff" value="{{ $model->nama_staff }}">
                                </div>

                                {{-- input tgl masuk stok --}}
                                <div class="mt-3 mb-3">
                                    <label for="tgl_masuk" class="form-label mb-3" style="text-align: right;"><b>Tanggal Masuk</b></label>
                                    <input type="date" name="tgl_masuk" class="form-control mb-2" placeholder="masukkan tanggal masuk" value="{{ $model->tgl_masuk }}">
                                </div>

                                {{-- input catatan --}}
                                <div class="mb-3">
                                    <label for="catatan" class="form-label mb-3" style="text-align: right;"><b>Catatan</b></label>
                                    <input type="text" name="catatan" class="form-control mb-2" placeholder="masukkan catatan" value="{{ $model->catatan }}">
                                </div>

                                {{-- input qty --}}
                                <div class="mb-3">
                                    <label for="catatan" class="form-label mb-3" style="text-align: right;"><b>Jumlah Qty</b></label>
                                    <input type="number" name="qty" class="form-control mb-2" placeholder="masukkan jumlah qty" value="{{ $model->qty }}">
                                </div>

                                {{-- input harga item --}}
                                <div class="mb-3">
                                    <label for="harga" class="form-label mb-3" style="text-align: right;"><b>Harga</b></label>
                                    <input type="number" name="harga" class="form-control mb-2" placeholder="masukkan harga item" value="{{ $model->harga }}">
                                </div>

                                {{-- input penerima --}}
                                <div class="mb-3">
                                    <label for="diterimaoleh" class="form-label mb-3" style="text-align: right;"><b>Diterima Oleh</b></label>
                                    <input type="text" name="penerima" class="form-control mb-2" placeholder="masukkan nama penerima" value="{{ $model->penerima }}">
                                </div>
                                
                                <button type="submit" class="btn app-btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<!--end of div-->
        </div>	
    </div>
</div>

@endsection