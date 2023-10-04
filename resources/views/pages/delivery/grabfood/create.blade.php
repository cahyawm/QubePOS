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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                    <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                                    <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <h6 class="mt-2">Tambah Harga Grabfood</h6>
                        </div>
                    </div>
                </div>
                <div class="app-card-body" style="padding: 10px 16px">
                    <form class="settings-form" method="POST" action="{{ url('grabfood') }}">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-6 col-xl-6 col-md-12 col-sm-12">
                                {{-- select jenis --}}
                                <div class="mb-3">
                                    <label class="form-label mb-2" style="text-align: right;"><b>Nama Produk</b></label>
                                    <select name="produk_id" class="form-select @error('produk_id') is-invalid @enderror">
                                        @foreach ( $produk as $produk )
                                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                        @endforeach
                                    </select>
                                    <small class="mb-4">*Pilih salah satu dari produk</small>
                                    {{-- <div class="error-message">
                                        <br>
                                    @error('produk_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div> --}}
                                </div>

                                {{-- input  --}}
                                <div class="mb-3">
                                    <label for="harga-kategori" class="form-label mb-2" style="text-align: right;"><b>Harga GrabFood</b></label>
                                    <input type="text" name="harga_delivery" class="form-control mb-4" placeholder="masukkan harga produk" required>
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