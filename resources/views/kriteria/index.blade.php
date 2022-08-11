@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Kriteria</h2>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header ">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ url('kriteria/add') }}" class="btn btn-info"><i class="zmdi zmdi-hc-fw"></i> Tambah Kriteria</a>
                            </div>
                            <div class="col-sm-2">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-file"></i> Cetak Data </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                        <a class="dropdown-item" target="_blank" href="{{ url('kriteria/cetak/pdf/master') }}">PDF</a> 
                                        <a class="dropdown-item" href="{{ url('kriteria/cetak/excel/master') }}">Excel</a> 
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="dt" width="100%"
                                class="table table-sm table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Attribute</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
        $('#dt').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("kriteria") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }, {
                    data: 'kode_kriteria',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nama_kriteria',
                    name: 'nama_lengkap'
                },
                {
                    data: 'attribute',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'email',
                    className: 'text-center'
                },

            ]
        });
        $(document).on('click', '.btn-hapus', function () {
            let id = $(this).attr('data-id');
            let base_url = "{{ url('') }}";
            let url = base_url + '/kriteria/hapus/' + id;
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = url;
                }
            })
        })
    })

</script>
@endsection
