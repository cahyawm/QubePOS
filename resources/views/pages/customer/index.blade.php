@extends('layouts.app')

@section('content')

{{-- <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4"> --}}
        <div class="container-xl">

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Welcome to Qube Cafe</h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">
                            <div>Pesan menu di Qube Cafe secara self-service.</div>
                        </div><!--//col-->
                    </div><!--//row-->
                    
                </div><!--//app-card-body-->
            </div><!--//inner-->
          </div><!--//app-card-->

          {{-- nav kategori --}}
          <ul class="nav nav-pills" style="margin-bottom: 24px">
            <li class="nav-item" style="margin-right: 10px">
              <a class="nav-link active" aria-current="page" href="#">Semua</a>
            </li>

            @foreach ($kategori as $k)
            <li class="nav-item" style="margin-right: 10px">
              <a class="nav-link" href="#">{{$k->nama}}</a>
            </li>
            @endforeach
          </ul>

          <h4>Semua Kategori</h4>

          {{-- pos item/card produk --}}
          <div id="card-produk">
            <div class="row g-3 justify-content-start">
              @foreach ($datas as $data)
              <div class="col-4 col-sm-4 col-md-4 col-xl-3 col-xxl-3" style="margin-right: -10px">
                <div class="card shadow-sm" style="width: 140px">
                  <img src="img/{{ $data->img }}" class="card-img-top ratio ratio-1x1">
                  <div class="card-body">
                    <p class="card-title"><b>{{ $data->nama }}</b></p>
                    <small class="card-text">Rp{{ number_format($data->harga, 0, ',', '.') }}</small>
                    
                    
                  </div>
                </div>
              </div>{{-- end of col --}}
              @endforeach
            </div>{{-- end of row --}}
          </div>

          <div class="cart-button">
            <a class="cart-btn app-btn-primary shadow-sm" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
          </a>
          </div>


















          {{-- end of div --}}
        </div>	
    </div>
</div>

@endsection