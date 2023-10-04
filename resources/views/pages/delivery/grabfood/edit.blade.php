@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0" href="{{ url('grabfood') }}">Edit Harga Grabfood</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            
            <hr class="mb-4">

            <form class="settings-form" method="POST" action="{{ url('grabfood/'.$model->id)}}">
                @csrf
                <div class="row align-items-center">
                    <div class="col-6 col-md-6 col-sm-12">
                        <input type="hidden" name="_method" value="PATCH">
                        {{-- select produk --}}
                        <label class="form-label mb-2" style="text-align: right;"><b>Nama Kategori</b></label>
                        <select name="produk_id" class="form-select">
                            @foreach ( $produk as $produk )
                            <option value="{{ $produk->id }}" {{ $produk->id == $model->produk_id ? 'selected' : ''}}>{{ $produk->nama }}</option>
                            @endforeach
                        </select>
                        <small class="mb-4">*Pilih salah satu dari produk</small>
                        <br> 

                        {{-- tentukan harga --}}
                        <label for="harga-kategori" class="form-label mt-3 mb-2" style="text-align: right;" ><b>Harga GrabFood</b></label>
                        <input type="text" name="harga_delivery" class="form-control mb-4" placeholder="masukkan harga produk" value="{{$model->harga_delivery}}">
                        <button type="submit" class="btn app-btn-primary mt-3">Simpan</button>
                    </div>
                </div>
            </form>
        </div>	
    </div>
</div>

@endsection