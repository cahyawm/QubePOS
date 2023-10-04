@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Pajak dan Biaya Layanan</h1>
                </div>
            </div><!--//row-->

            <hr class="mb-4">
                <div class="row g-4 settings-section">
									<form class="settings-form" action="{{url('pajak/'.$datas->id)}}" method="POST">
										@csrf
										<input type="hidden" name="_method" value="PATCH">
										<div class="col-12 col-md-6">
											<div class="app-card-body">
												<h4 class="section-title">Rincian Pajak</h4>
													<div class="mb-3">
														<label for="setting-input-1" class="form-label">Nama Pajak</label>
														<input type="text" class="form-control" name="nama_pajak" placeholder="Isikan nama pajak" value="{{ $datas->nama_pajak }}">
													</div>
													<div class="mb-3">
														<label for="setting-input-2" class="form-label">Persentase Pajak</label>
														<div class="input-group mb-4">
															<input type="text" class="form-control" name="besar_pajak" placeholder="Isikan presentase pajak" value="{{ $datas->besar_pajak }}">
															<span class="input-group-text">%</span>
														</div>
													</div>
											</div><!--//app-card-body-->
										</div>

										<div class="col-12 col-md-6">
											<div class="app-card-body">
												<h4 class="section-title">Rincian Biaya Layanan</h4>
												<div class="input-group mb-4">
													<span class="input-group-text">Rp</span>
													<input type="text" class="form-control" name="biaya_layanan" placeholder="Isikan biaya layanan" value="{{ $datas->biaya_layanan }}">
												</div>
											</div><!--//app-card-body-->
										</div>

										<button type="submit" class="btn app-btn-primary mt-2">Simpan</button>
									</form>
								</div><!--//row-->

        <!-- end of div -->
        </div>
    </div>
</div>
@endsection
