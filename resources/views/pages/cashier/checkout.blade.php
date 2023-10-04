<html>
  <head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- admin style -->
    <link href="{{ asset('assets/admin-style/css/portal.css') }}" rel="stylesheet">

    {{-- icon --}}
    <link rel="icon" href="{{ asset('assets/img/icon.svg')}}">
    <title>QubePOS</title>
</head>

<section class="h-100 h-custom" style="background-color: #f1efef;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-6">

        {{-- card payment --}}
        <div class="card app-card shadow-sm" style="border-radius: 15px;">
          <div class="app-card-body p-0">
            <div class="p-5">
              <div class="d-flex justify-content-between align-items-center ">
                <h3 class="text-black">Pembayaran</h3>
              </div>
              <hr class="mb-1">
              <div class="row mb-3 d-flex justify-content-between align-items-center">
                <div class="table-responsive">
                  <table class="table mb-0 table-striped">
                      <thead>
                          <tr>
                              <th class="cell">Nama</th>
                              <th class="cell">Qty</th>
                              <th class="cell">Harga</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td class="cell">Cireng</td>
                            <td class="cell">2</td>
                            <td class="cell">Rp30.000</td>
                          </tr>
                          <tr>
                            <td class="cell">Cireng</td>
                            <td class="cell">2</td>
                            <td class="cell">Rp30.000</td>
                          </tr>
                      </tbody>
                  </table>
                </div>
                
                
                <div class="d-flex justify-content-between mt-3">
                  <h5 class="text-uppercase">Total Bill</h5>
                  <h5>Rp60.000</h5>
                </div>

                <div class="row">
                  <button type="submit" class="btn app-btn-primary mt-4 mr-auto ml-auto">
                    {{ __('Confirm Bill') }}
                  </button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>
</html>