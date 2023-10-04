@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Dashboard</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                        <h3 class="mb-3">Welcome back, {{ Auth::user()->name }}!</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9">
                                <div>Atur aplikasi kasirmu dan lihat laporan penjualan dan pendapat cafe dengan mudah.</div>
                            </div><!--//col-->
                        </div><!--//row-->
                        
                    </div><!--//app-card-body-->
                </div><!--//inner-->
            </div><!--//app-card-->

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Penjualan</h4>
                            <div class="stats-figure">Rp{{ number_format($order, 0, ',', '.')}}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ url('order') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Kategori</h4>
                            <div class="stats-figure">{{ $kategori }}</div>
                            <div class="stats-meta">Open</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ url('/kategori') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Produk</h4>
                            <div class="stats-figure">{{ $produk }}</div>
                            <div class="stats-meta">Open</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ url('/produk') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->


        <!-- end of div -->
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
