@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Tambah Alternatif</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Alternatif</a></li>
                    <li class="breadcrumb-item active">Alternatif</li>
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
                        <h2>Alternatif Baru</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('alternatiff/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Alternatif <span class="text-danger"> <small> *</small></span></label>
                                <input required type="text" name="kode_alternatif" class="form-control" id="exampleInputEmail1" placeholder="Kode Alternatiff" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Alternatif <span class="text-danger"> <small> *</small></span></label>
                                <input required type="text" name="nama_alternatif" class="form-control" id="exampleInputEmail1" placeholder="Nama Alternatiff" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="exampleInputEmail1">No KK</label>
                                <input type="text" name="no_kk" class="form-control" id="exampleInputEmail1" placeholder="Nomor KK" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="exampleInputEmail1">NIK </label>
                                <input type="text" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Nomor NIK" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="exampleInputEmail1">Alamat </label>
                                <select name="alamat" class="form-control show-tick">
                                    <option value="" selected disabled>Pilih alamat</option>
                                    <option value="Dusun Cagak">Dusun Cagak</option>
                                    <option value="Dusun Agung">Dusun Agung</option>
                                </select>
                            </div>
                            <div class="row form-group" style="display:none">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">RT </label>
                                    <select name="rt" class="form-control show-tick">
                                        <option value="" selected disabled>Pilih RT</option>
                                        <option value="001">001</option>
                                        <option value="002">002</option>
                                        <option value="003">003</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">RW </label>
                                    <select name="rw" class="form-control show-tick">
                                        <option value="" selected disabled>Pilih RW</option>
                                        <option value="001">001</option>
                                        <option value="002">002</option>
                                        <option value="003">003</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan Alternatif</label>
                                <input  type="text" name="keterangan_alternatif" class="form-control" id="exampleInputEmail1" placeholder="Keterangan Alternatiff" aria-describedby="emailHelp">
                            </div> -->
                            
                            <a href="{{ url('alternatif/index') }}" class="btn btn-danger"><i class="zmdi zmdi-hc-fw"></i> Batal</a>
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
        // $('select').select2({})
    })

</script>
@endsection
