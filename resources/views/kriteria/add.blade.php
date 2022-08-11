@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Tambah Kriteria</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Kriteria</a></li>
                    <li class="breadcrumb-item active">Kriteria</li>
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
                    <div class="header ">
                        <h2>Kriteria Baru</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('kriteria/store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Kriteria <span class="text-danger"> <small> *</small></span></label>
                                <input required type="text" name="kode_kriteria" class="form-control" id="exampleInputEmail1" placeholder="Kode Kriteria" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kriteria <span class="text-danger"> <small> *</small></span></label>
                                <input required type="text" name="nama_kriteria" class="form-control" id="exampleInputEmail1" placeholder="Nama Kriteria" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Atribute Kriteria <span class="text-danger"> <small> *</small></span></label>
                                 <select required name="attribute_kriteria" class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="benefit">Benefit</option>
                                        <option value="cost">Cost</option>
                                    </select>
                            </div>
                            
                            <a href="{{ url('kriteria') }}" class="btn btn-danger"><i class="zmdi zmdi-hc-fw"></i> Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-hc-fw"></i> Simpan</button>
                        </form>
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
        $('#dt').dataTable({})
    })

</script>
@endsection
