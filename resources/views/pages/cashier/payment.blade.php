<html>
<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- admin style -->
    <link href="{{ asset('assets/admin-style/css/portal.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/icon.svg') }}" rel="icon">
    <title>QubePOS</title>
</head>

<style>
    body{
        font-family: 'Poppins';
    }
</style>

<body>
    <section height="max-content">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #fe8767 !important;">
                        <div class="card-body p-5">
                            <p class="lead fw-bold" style="color: #00000;">Pembayaran</p>
                            <p>Pilih Metode Pembayaran</p>
                            <form method="POST" action="/pay">
                                @csrf
                                <input type="number" name="id" value={{ $id }} hidden>
                                <div class="d-flex flex-row pb-3">
                                    <div class="d-flex align-items-center pe-2">
                                        <input class="form-check-input" type="radio" name="method"
                                            id="radioNoLabel1v" value="cash"  />
                                    </div>
                                    <div class="rounded border w-100 p-3">
                                        <p class="d-flex align-items-center mb-0">
                                            Cash
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row pb-3">
                                    <div class="d-flex align-items-center pe-2">
                                        <input class="form-check-input" type="radio" name="method"
                                            id="radioNoLabel2v" value="debit"  />
                                    </div>
                                    <div class="rounded border w-100 p-3" >
                                        <p class="d-flex align-items-center mb-0">
                                            Debit Card
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="d-flex align-items-center pe-2">
                                        <input class="form-check-input" type="radio" name="method"
                                            id="radioNoLabel3v" value="wallet"  />
                                    </div>
                                    <div class="rounded border w-100 p-3" >
                                        <p class="d-flex align-items-center mb-0">
                                            E-Wallet
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn app-btn-primary mb-4 ml-4 mt-4 mr-auto ml-auto">
                                        {{ __('Lanjut') }}
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
