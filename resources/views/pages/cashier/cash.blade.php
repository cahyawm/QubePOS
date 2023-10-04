<html>

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
    <!-- admin style -->
    <link href="{{ asset('assets/admin-style/css/portal.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/icon.svg') }}" rel="icon">
    
</head>
<body>
    <section height="max-content">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #fe8767 !important;">
                        <div class="card-body p-3">
                            {{-- side cart --}}
                            <div class="">
                                <div class="card app-card">
                                    <div class="card-body">
                                        {{-- top cart --}}
                                        <div class="row g-3 mb-4 align-items-center justify-content-between">
                                            <div class="col-auto">
                                                <h5>Pembayaran</h5>
                                                {{-- <p>No Antrian #0003</p> --}}
                                            </div>
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
                                                    @foreach ($detail as $index => $cart)
                                                        <tr>
                                                            <td class="cell">
                                                                {{ $cart->nama }}
                                                                <br>
                                                                <small>Rp{{ number_format($cart->harga, 0, ',', '.') }}</small>
                                                            </td>
                                                            <td class="cell text-center">
                                                                {{ $cart->jumlah }}
                                                            </td>
                                                            <td class="cell">
                                                                Rp{{ number_format($cart->total, 0, ',', '.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- grandtotal --}}
                                        <form method="POST" action="/pay/confirm">
                                            @csrf
                                            <div class="table-responsive mt-3">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <input type="text" name="id" id="id"
                                                            value={{ $id }} hidden>
                                                        <tr>
                                                            <td class="cell"><b>Subtotal</b></td>
                                                            <td class="cell text-right">
                                                                Rp{{ number_format($order['subtotal'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell"><b>Promo</b></td>
                                                            <td class="cell text-right">
                                                                -Rp{{ number_format($order['diskon'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            {{-- nama taxname sudah terbaca --}}
                                                            <td class="cell"><b>Pajak</b></td>
                                                            <td class="cell text-right">
                                                                Rp{{ number_format($order['pajak'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell"><b>Total</b></td>
                                                            <td class="cell text-right" name="total"
                                                                value={{ $order['total'] }}>
                                                                Rp{{ number_format($order['total'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell"><b>Bayar</b></td>
                                                            <td class="cell text-right">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Rp</span>
                                                                    <input class="input-bayar form-control"
                                                                        type="number" name="bayar">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell"><b>Kembalian</b></td>
                                                            <td class="cell text-right label-kembalian">

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <script>
                                                let bayar = document.querySelector('.input-bayar');
                                                let kembalian = document.querySelector('.label-kembalian');
                                                window.onload = function() {
                                                    kembalian.innerHTML = 'Rp' + 0;
                                                }
                                                bayar.addEventListener('keyup', function() {
                                                    let total = {{ $order['total'] }};
                                                    let bayar = this.value;
                                                    let hasilKembalian = bayar - total;
                                                    console.log(total);
                                                    kembalian.innerHTML = 'Rp' + hasilKembalian;
                                                });
                                            </script>
                                            <div class="row g-2 mt-2 align-items-center justify-content-between">
                                                {{-- ketika diklik memanggil fungsi checkout pada livewire Cart --}}
                                                <button type="submit" class="btn app-btn-primary"><b>Bayar</b></button>
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
                </div>
            </div>
        </div>
    </section>
</body>

</html>
