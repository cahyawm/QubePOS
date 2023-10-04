@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Stok Keluar</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <br>
                            @if(Session ::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
                            @endif

                        <div class="row g-2 mb-3 justify-content-start justify-content-md-end align-items-center">
                            {{-- <div class="col-auto">
                                <form method="post" class="form-inline">
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="date" name="tgl_masuk" class="form-control row-3">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" name="filter_tgl" class="btn app-btn-secondary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            
                            {{-- filter search --}}
                            <div class="col-auto">
                                <div class="app-search-box col">
                                    <form methods="GET" action="{{ url('stokkeluar')}}" class="app-search-form">   
                                        <input type="text" placeholder="Search..." name="keyword" class="form-control search-input">
                                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
                                    </form>
                                </div>
                            </div>

                            <div class="col-auto">						    
                                <a target="_blank" class="btn app-btn-secondary" href="{{ url('cetakkeluar')}}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>Download PDF
                                </a>
                            </div>

                            <div class="col-auto">						    
                                <a class="btn app-btn-secondary" href="{{ url('stokkeluar/create') }}"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                    Tambah Stok Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav id="catalog-tab" class="app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link" id="product-tab"  href="{{ url('/stokmasuk') }}" role="tab" >Stok Masuk</a>
                <a class="flex-sm-fill text-sm-center nav-link active" id="product-tab"  href="{{ url('/stokkeluar') }}" role="tab" >Stok Keluar</a>
            </nav>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="category-tab">
                    <div class="card app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">No.</th>
                                            <th class="cell">Staff</th>
                                            <th class="cell">Tanggal</th>
                                            <th class="cell">Catatan</th>
                                            <th class="cell">Qty</th>
                                            <th class="cell">Harga</th>
                                            <th class="cell">Diterima oleh</th>
                                            <th class="cell"></th>
                                        </tr>
									</thead>
									<tbody>
                                            @php $i=1 @endphp
                                            @foreach($datas as $key => $p)
                                            <tr>
                                                <td class="cell">{{$datas->firstItem() + $key}}</td>
                                                <td class="cell">{{$p->nama_staff}}</td>
                                                <td class="cell">{{ date('d M Y', strtotime($p->tgl_keluar)) }}</td>
                                                <td class="cell">{{$p->catatan}}</td>
                                                <td class="cell">{{$p->qty}}</td>
                                                <td class="cell">Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                                                <td class="cell">{{$p->penerima}}</td>
                                                <td class="cell">
                                                    <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                                                        <!-- edit button -->
                                                        <div class="col-auto">
                                                            <a class="btn-action app-btn-secondary" href="{{ url('stokkeluar/'.$p->id.'/edit') }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <!-- delete button -->
                                                        <div class="col-auto">
                                                            <form action="{{ url('stokkeluar/'.$p->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn-action app-btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
									</tbody>
								</table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->

                    {{ $datas->links() }}

<!-- end of div -->
        </div>	
    </div>
</div>
@endsection