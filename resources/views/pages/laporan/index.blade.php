@extends('layouts.app')

@section('content')
    @include('partials.sidebar')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Laporan</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <div class="app-search-box col">
                                        <form class="app-search-form">
                                            <input type="text" placeholder="Search..." name="search"
                                                class="form-control search-input">
                                            <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                                    class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                    <!--//app-search-box-->
                                </div>
                                <!--//col-->

                                <div class="col-auto">
                                    <select class="form-select w-auto">
                                        <option selected value="option-1">All</option>
                                        <option value="option-2">This week</option>
                                        <option value="option-3">This month</option>
                                        <option value="option-4">Last 3 months</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" href="#">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>Download CSV
                                    </a>
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                    </div>
                </div>

                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-paid-tab" data-bs-toggle="tab"
                        href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Laporan per
                        Kategori Transaksi</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-all-tab" data-bs-toggle="tab"
                        href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Laporan per
                        Kategori Menu</a>
                </nav>

                {{-- laporan per kategori --}}
                {{-- <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <div class="card app-card app-card-orders-table shadow-sm mb-5">
                        <h6 class="card-header">Ringkasan</h6>
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Total Qty Terjual</th>
											<th class="cell">Total Penjualan</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="cell">10</td>
											<td class="cell"><span class="truncate">Rp400.000</span></td>
										</tr>
									</tbody>
								</table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->

                    <div class="card app-card app-card-orders-table shadow-sm mb-5">
                        <h6 class="card-header">Penjualan Berdasarkan Kategori Menu</h6>
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Kategori</th>
                                            <th class="cell">Qty Terjual</th>
											<th class="cell">Total Penjualan</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="cell">Food</td>
											<td class="cell"><span class="truncate">8</span></td>
											<td class="cell">90.000</td>
											<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
										</tr>
										<tr>
                                            <td class="cell">Coffee</td>
											<td class="cell"><span class="truncate">10</span></td>
											<td class="cell">150.000</td>
											<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
										</tr>
									</tbody>
								</table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->

                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
                                <a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav><!--//app-pagination-->
                </div><!--//tab-pane-->
            </div> --}}

                {{-- laporan per transaksi --}}
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-paid" role="tabpanel"
                        aria-labelledby="orders-paid-tab">

                        <div class="card app-card app-card-orders-table shadow-sm mb-5">
                            <h6 class="card-header">Ringkasan</h6>
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Total Qty Terjual</th>
                                                <th class="cell">Total Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="cell">{{$ringkasan_order['qty']}}</td>
                                                <td class="cell"><span class="truncate"> Rp{{ number_format($ringkasan_order['total'], 0, ',', '.') }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->

                        <div class="card app-card app-card-orders-table shadow-sm mb-5">
                            <h6 class="card-header">Penjualan Berdasarkan Kategori Transaksi</h6>
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Tipe Transaksi</th>
                                                <th class="cell">Qty Terjual</th>
                                                <th class="cell">Total Penjualan</th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result_order as $key => $item)
                                                <tr>
                                                    <td class="cell">{{ $item->metode_pembayaran }}</td>
                                                    <td class="cell">{{ $item->qty }}</td>
                                                    <td class="cell">
                                                        Rp{{ number_format($total[$key]->total, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->
                </div>

                {{-- laporan per kategori --}}
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                        <div class="card app-card app-card-orders-table shadow-sm mb-5">
                            <h6 class="card-header">Ringkasan</h6>
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Total Qty Terjual</th>
                                                <th class="cell">Total Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="cell">{{$ringkasan_menu['qty']}}</td>
                                                <td class="cell"><span class="truncate"> Rp{{ number_format($ringkasan_menu['total'], 0, ',', '.') }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->

                        <div class="card app-card app-card-orders-table shadow-sm mb-5">
                            <h6 class="card-header">Penjualan Berdasarkan Kategori Menu</h6>
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Tipe Produk</th>
                                                <th class="cell">Qty Terjual</th>
                                                <th class="cell">Total Penjualan</th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result_menu as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nama }}</td>
                                                    <td class="cell">{{ $item->qty }}</td>
                                                    <td class="cell">
                                                        Rp{{ number_format($item->total_penjualan, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->
                </div>




            </div>
        </div>
    </div>
@endsection
