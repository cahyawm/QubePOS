@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Penjualan</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <div class="app-search-box col">
                                    <form class="app-search-form">   
                                        <input type="text" placeholder="Search..." name="search" class="form-control search-input">
                                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
                                    </form>
                                </div><!--//app-search-box-->
                            </div><!--//col-->
                            
                            <div class="col-auto">						    
                                <a class="btn app-btn-secondary" href="#">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>Download PDF
                                </a>
                            </div>
                        </div><!--//row-->
                    </div>
                </div>
            </div>

            {{-- nav jenis penjualan --}}
            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
              <a class="flex-sm-fill text-sm-center nav-link {{ !app('request')->input('orders-paid') ? 'active' : '' }} {{ app('request')->input('orders-unpaid') > 0 ? 'active' : '' }}"
                  id="orders-unpaid-tab" data-bs-toggle="tab" href="#orders-unpaid" role="tab"
                  aria-controls="orders-paid" aria-selected="false">Butuh
                  Diproses</a>
              <a class="flex-sm-fill text-sm-center nav-link {{ app('request')->input('orders-paid') > 0 ? 'active' : '' }}"
                  value="paid" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab"
                  aria-controls="orders-all" aria-selected="true">Pesanan Selesai</a>
              <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                  href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                  aria-selected="false">Dibatalkan</a>
            </nav>

            {{-- pesanan selesai --}}
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane {{ app('request')->input('orders-paid') > 0 ? 'fade show active' : 'fade' }}" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                    <div class="card app-card app-card-orders-table shadow-sm mb-5">
                        <h6 class="card-header">Pesanan Selesai</h6>
                        <div class="app-card-body">
                              <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                  <thead>
                                    <tr>
                                      <th class="cell">ID Pesanan</th>
                                      <th class="cell">Tanggal</th>
                                      <th class="cell">Total</th>
                                      <th class="cell">Status</th>
                                      <th class="cell"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse ($paid as $data)
                                      {{-- @if ($data->status == 'paid') --}}
                                      <tr>
                                        <td class="cell">{{ $data->id }}</td>
                                        <td class="cell">
                                          {{ $data->created_at->format('d M Y') }}
                                          <br>
                                          <small>{{ $data->created_at->format('H:i:s T') }}</small>
                                        </td>
                                        <td class="cell">Rp{{ number_format($data->total, 0, ',', '.') }}</td>
                                        <td class="cell"><span class="badge bg-success">{{$data->status}}</span></td>
                                        <td class="cell">
                                          <button type="button" onclick="viewDetail({{$data->id}})" class="btn-action app-btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalView">View</button>
                                        </td>
                                      </tr>
                                      {{-- @endif --}}
                                    @empty
                                      <tr>
                                        <td class="cell text-center" colspan="5">
                                          No Data Found
                                        </td>
                                      </tr>
                                    @endforelse
                                  </tbody>
                                </table>
                              </div>
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                    {{ $paid->links() }}
                </div><!--//tab-pane-->
            </div>

            {{-- pesanan butuh diproses --}}
            <div class="tab-content" id="orders-table-tab-content">
              <div class="tab-pane fade {{ app('request')->input('orders-paid') > 0 ? 'fade' : ' show active' }} {{ app('request')->input('orders-unpaid') > 0 ? 'show active' : 'fade' }}" id="orders-unpaid" role="tabpanel" aria-labelledby="orders-unpaid-tab">
                  <div class="card app-card app-card-orders-table shadow-sm mb-5">
                      <h6 class="card-header">Pesanan Butuh Diproses</h6>
                      <div class="app-card-body">
                            <div class="table-responsive">
                              <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                  <tr>
                                    <th class="cell">ID Pesanan</th>
                                    <th class="cell">Tanggal</th>
                                    <th class="cell">Total</th>
                                    <th class="cell">Status</th>
                                    <th class="cell"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($unpaid as $data)
                                    <tr>
                                      <td class="cell">{{ $data->id }}</td>
                                      <td class="cell">
                                        {{ $data->created_at->format('d M Y') }}
                                        <br>
                                        <small>{{ $data->created_at->format('H:i:s T') }}</small>
                                      </td>
                                      <td class="cell">Rp{{ number_format($data->total, 0, ',', '.') }}</td>
                                      <td class="cell"><span class="badge bg-danger">{{$data->status}}</span></td>
                                      <td class="cell">
                                        <button type="button" onclick="viewDetail({{$data->id}})" class="btn-action app-btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalView">View</button>
                                      </td>
                                    </tr>
                                  @empty
                                    <tr>
                                      <td class="cell text-center" colspan="4">
                                        No Data Found
                                      </td>
                                    </tr>
                                  @endforelse
                                </tbody>
                              </table>
                            </div>
                      </div><!--//app-card-body-->		
                  </div><!--//app-card-->
                  {{ $unpaid->links() }}
              </div><!--//tab-pane-->
          </div>

          <!-- Modal view detail -->
          <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Order</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card app-card shadow-sm">
                    <div class="app-card-body">
                      <div class="table-responsive">
                        <table class="table mb-0 table-striped">
                          <thead>
                            <tr>
                              <th class="cell">Produk</th>
                              <th class="cell">Qty</th>
                              <th class="cell">Total</th>
                            </tr>
                          </thead>
                          <tbody class="product-view">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  {{-- <hr> --}}
                  <div class="table-responsive mt-3">
                    <table class="table mb-0">
                        <tbody class="summary-view">
                            
                        </tbody>
                      </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn app-btn-dismiss" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end of Modal view detail -->


        </div>
    </div>
</div>

@endsection