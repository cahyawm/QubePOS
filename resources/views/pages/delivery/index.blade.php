@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert" style="background-color:#FFF1CA;">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                        <h1 class="delivery mb-3">Food Delivery</h1>
                        <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">Atur harga jual produk untuk food delivery</div>
                        </div><!--//row-->

                    </div><!--//app-card-body-->
                </div><!--//inner-->
            </div><!--//app-card-->

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                    <table class="table table-striped">
                            <tr>
                                <td class="cell">GrabFood</td>
                                <td>
                                    <div class="col-auto" style="float: right;">
                                        <a class="btn app-btn-primary" href="{{url('/grabfood')}}" style="background-color: #FFD666;">Aktif</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="cell">GoFood</td>
                                <td>
                                    <div class="col-auto" style="float: right;">
                                        <a class="btn app-btn-primary" href="#" style="background-color: #DBDBDB;">Tidak Aktif</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="cell">ShopeeFood</td>
                                <td>
                                    <div class="col-auto" style="float: right;">
                                        <a class="btn app-btn-primary" href="#" style="background-color: #DBDBDB;">Tidak Aktif</a>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="cell">TravelokaEats</td>
                                <td>
                                    <div class="col-auto" style="float: right;">
                                        <a class="btn app-btn-primary" href="#" style="background-color: #DBDBDB;">Tidak Aktif</a>
                                    </div>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>		
        </div>
    </div>
</div>
</div><!-- container -->
</div><!-- app-content -->
</div><!-- app-wrapper -->

@endsection
