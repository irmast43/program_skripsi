@extends('index')
@section('page-index')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2 class="title">Dashboard</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                    class="zmdi zmdi-sort-amount-desc"></i></button>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                    class="zmdi zmdi-arrow-right"></i></button>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body text-center">
                    <h2>{{ dashboard()->total_krit }}</h2>
                    <h6><a href="{{ url('kriteria') }}">Kriteria</a></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body text-center">
                    <h2>{{ dashboard()->total_alt }}</h2>
                    <h6><a href="{{ url('alternatif/index') }}">Alternatif</a></h6>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body text-center">
                   <h2><i class="zmdi zmdi-hc-fw"></i></h2>
                    <a href="{{ url('perhitungan') }}">AHP-TOPSIS</a>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body text-center">
                <h2><i class="zmdi zmdi-hc-fw"></i></h2>
                    <a href="{{ url('perhitunganCopras/index') }}">COPRAS</a>
                    <br>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
