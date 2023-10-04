@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card app-card shadow-sm">
                <div class="header" style="border-bottom: 0.1px solid #e7e9ed">
                    <div class="row g-3 align-items-center px-3 py-2">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="app-icon-holder icon-holder-mono">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <h6 class="mt-2">Tambah User</h6>
                        </div>
                    </div>
                </div>
                <div class="app-card-body" style="padding: 10px 16px">
                    <form class="settings-form" method="POST" action="{{ url('user') }}">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-6 col-xl-6 col-md-8 col-sm-12">
                                <label for="nama-user" class="form-label mb-2" style="text-align: right;"><b>Nama User</b></label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="masukkan nama user" required>
                                
                                <label for="email-user" class="form-label mb-2" style="text-align: right;"><b>Alamat Email</b></label>
                                <input type="text" name="email" class="form-control mb-3" placeholder="masukkan alamat email" required>

                                <label for="pass-user" class="form-label mb-2" style="text-align: right;"><b>Password</b></label>
                                <input type="password" name="password" class="form-control mb-3" placeholder="masukkan password" required>
                                
                                <label for="pass2-user" class="form-label mb-2" style="text-align: right;"><b>Konfirmasi Password</b></label>
                                <input type="password" name="real_password" class="form-control mb-3" placeholder="tulis ulang kembali password" required>
                                
                                <label for="role-user" class="form-label mb-2" style="text-align: right;"><b>Role User</b></label>
                                <select name="role" class="form-select">
                                    @foreach ( $datas as $data )
                                    <option value="{{ $data->role_name }}">{{ $data->role_name }}</option>
                                    @endforeach
                                </select>
                                <small class="mb-3">*Pilih role user Anda</small>
                                <br>
                                <button type="submit" class="btn app-btn-primary mt-4">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        {{-- end of div --}}
        </div>	
    </div>
</div>

@endsection