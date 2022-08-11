@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Alternatif</h2>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header ">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ url('alternatiff/add') }}" class="btn btn-info"><i
                                        class="zmdi zmdi-hc-fw"></i>
                                    Tambah
                                    Alternatif</a>
                            </div>
                            <div class="col-sm-2">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="zmdi zmdi-file"></i> Cetak Data </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" target="_blank"
                                            href="{{ url('alternatif/cetak/pdf/master') }}">PDF</a>
                                        <a class="dropdown-item"
                                            href="{{ url('alternatif/cetak/excel/master') }}">Excel</a>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->


                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#exampleModal">
                                    Import File
                                </button>
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
                                        <th>Kode Alternatif</th>
                                        <th>Nama Alternatif</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>RT/RT</th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" action="{{ route('importFile.alternatif') }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Document (.xlsx) <small style="color: red">*</small></label>
                        <input type="file" name="file_excel" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        let asset_url = "{{ url('') }}"
        $('#dt').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("alternatif/index") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'kode_alternatif',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nama_alternatif',
                    name: 'nama_lengkap'
                },
                {
                    data: 'no_kk',
                    name: 'nama_lengkap',
                    visible: false,
                },
                {
                    data: 'nik',
                    name: 'nama_lengkap',
                    visible: false,
                },

                {
                    data: 'alamat',
                    name: 'email',
                    visible: false,
                },
                {
                    data: 'rt',
                    name: 'email',
                    visible: false,
                    render: function (meta, data, row) {
                        return (row.rt == null ? '000' : row.rt) + '/' + (row.rw == null ?
                            '000' : row.rw)
                    }
                },
                {
                    data: 'action',
                    name: 'email',
                    className: 'text-center'
                },

            ]
        })

        $(document).on('click', '.btn-hapus', function () {
            let id = $(this).attr('data-id');
            let base_url = "{{ url('') }}";
            let url = base_url + '/alternatiff/hapus/' + id;
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
