@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Nilai Bobot Copras</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Nilai Bobot Copras</a></li>
                    <li class="breadcrumb-item active">Nilai Bobot Copras</li>
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
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-6">
                <div class="card">
                    <div class="body">
                        <form action="{{ url('/bobot/copras/store') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @foreach($kriteria as $k)
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ $k->kode_kriteria }}</label>
                                <input value="{{ $k->nilai }}" name="total[{{ $k->kode_kriteria }}]" data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" class="input-mask total form-control text-left form-control-sm" placeholder="Nilai {{ $k->kode_kriteria }}">
                            </div>
                            @endforeach
                            <a href="{{ url('/') }}" class="btn btn-danger"><i class="zmdi zmdi-hc-fw"></i> Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-hc-fw"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        $(".input-mask").inputmask({
            removeMaskOnSubmit: true,
            autoUnmask: true,
            unmaskAsNumber: true
        });
    })

</script>
@endsection
