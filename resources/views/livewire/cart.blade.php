<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row">
                <div class="col-7 col-xl-7 col-md-7">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <div class="app-search-box col">
                                        <form class="app-search-form">
                                            <input type="text" placeholder="Cari produk" name="keyword"
                                                class="form-control search-input">
                                            <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                                    class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                    <!--//app-search-box-->
                                </div>
                                <!--//col-->

                                <div class="col-auto">
                                    <select id="SelectorPrice" class="form-select w-auto" wire:model="category">
                                        <option value="dine-in">Dine-in/Takeaway</option>
                                        <option value="delivery">Food Delivery</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end of top items --}}

                    {{-- nav kategori --}}
                    <ul class="nav nav-pills" style="margin-bottom: 24px">
                        <li class="nav-item" style="margin-right: 10px">
                            <a class="nav-link active" aria-current="page" href="#">Semua kategori</a>
                        </li>

                        @foreach ($kategori as $k)
                            <li class="nav-item" style="margin-right: 10px">
                                <a class="nav-link" href="#">{{ $k->nama }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <h5>Semua Kategori</h5>
                    <div class="row">
                        @foreach ($datas as $data)
                            <div class="col-md-3 mb-3 card-food" id="card-food">
                                <div class="card app-card" style="width: 140px">
                                    <img src="img/{{ $data->img }}" alt="" class="card-img-top"
                                        height="140px">
                                    <div class="card-body">
                                        <p class="card-title"><b>{{ $data->nama }}</b></p>
                                        <small>Rp{{ number_format($data->harga, 0, ',', '.') }}</small>
                                    </div>
                                    <div class="card-footer">
                                        {{-- <div class="row"> --}}
                                        <a wire:click="addItem('{{ $data->id }}')"
                                            class="btn app-btn-primary stretched-link">Add</a>
                                        {{-- <button type="button" >Add</button> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- end of col-7 --}}

                {{-- side cart --}}
                <div class="col-5 col-xl-5 col-md-5">
                    <div class="card app-card">
                        <div class="card-body">
                            {{-- top cart --}}
                            <div class="row g-3 mb-4 align-items-center justify-content-between">
                                <div class="col-auto">
                                    <h5>Pesanan Baru</h5>
                                    <p>No Antrian #{{$antrian}}</p>
                                    {{-- <p>No Antrian #003</p> --}}
                                </div>
                                <div class="col-auto">
                                    <div
                                        class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                        <div class="col-auto">
                                            <a href="#" wire:click="removeAllItem()"
                                                class="btn-action app-btn-delete">clear all</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="" class="btn-action app-btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>{{-- row --}}
                                </div>{{-- col --}}
                            </div>{{-- row --}}
                            {{-- end of top cart --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table mb-0 text-left table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="cell">Nama</th>
                                            <th class="cell">Qty</th>
                                            <th class="cell">Harga</th>
                                            {{-- <th class="cell"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($carts as $index=>$cart)
                                            <tr>
                                                <td class="cell">
                                                    {{ $cart['name'] }}
                                                    <br>
                                                    <small>Rp{{ number_format($cart['pricesingle'], 0, ',', '.') }}</small>
                                                </td>
                                                <td class="cell">
                                                    <div class="row g-3 justify-content-center">
                                                        <div class="col-auto">
                                                            <a href="#"
                                                                wire:click="decreaseItem('{{ $cart['rowId'] }}')"
                                                                class="btn-qty app-btn-secondary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-dash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto text-center">
                                                            {{-- <input type="text" name="qty" id="qty" class="form-control" value="{{$cart['qty']}}"> --}}
                                                            {{ $cart['qty'] }}
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#"
                                                                wire:click="increaseItem('{{ $cart['rowId'] }}')"
                                                                class="btn-qty app-btn-secondary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-plus" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cell">Rp{{ number_format($cart['price'], 0, ',', '.') }}
                                                </td>
                                                {{-- <td class="cell">
                                                    <a href="#" wire:click="removeItem('{{ $cart['rowId'] }}')" class="btn-qty app-btn-delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @empty
                                            <td colspan="3" class="text-center">
                                                <small>empty cart</small>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- additional button --}}
                            <div
                                class="row g-2 justify-content-start justify-content-md-start align-items-center mt-3">
                                <div class="col-auto">
                                    <button class="btn-action app-btn-secondary" wire:click="addDiscount">
                                        {{-- data-bs-toggle="modal" data-bs-target="#modalDiskon" --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                            <path
                                                d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                        </svg> apply disc.
                                    </button>
                                </div>
                                {{-- <div class="col-auto">
                                    <button wire:click="enableTax" class="btn-action app-btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                        </svg> apply tax
                                    </button>
                                </div> --}}
                            </div>
                            {{-- additional button --}}

                            {{-- grandtotal --}}
                            <div class="table-responsive mt-3">
                                <form action="">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="cell">Subtotal</td>
                                                <td class="cell text-right">
                                                    Rp{{ number_format($summary['subTotal'], 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="cell">Diskon/Promo</td>
                                                <td class="cell text-right">
                                                    -Rp{{ number_format($summary['diskon'], 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                {{-- nama taxname sudah terbaca --}}
                                                <td class="cell">{{ $taxname }}</td>
                                                <td class="cell text-right">
                                                    Rp{{ number_format($summary['pajak'], 0, ',', '.') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row g-2 mt-2 align-items-center justify-content-between">
                                {{-- ketika diklik memanggil fungsi checkout pada livewire Cart --}}
                                <a wire:click="checkout()"
                                    class="btn app-btn-primary">Rp{{ number_format($summary['total'], 0, ',', '.') }}</a>
                            </div>
                            </form>
                            {{-- grandtotal --}}
                        </div>

                        {{-- end card body --}}
                    </div>
                    {{-- end of card --}}
                </div>
            </div>
            {{-- side cart --}}

        </div>
        {{-- end of big row --}}

        {{-- end of div --}}
    </div>
</div>
</div>
@include('partials.sidebar')
