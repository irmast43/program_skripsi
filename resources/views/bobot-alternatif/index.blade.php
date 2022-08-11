@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Nilai Bobot Alternatif</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Nilai Bobot Alternatif</a></li>
                    <li class="breadcrumb-item active">Nilai Bobot Alternatif</li>
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
                    <div class="body">
                        <form action="{{ url('/bobot/kriteria/store') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                                style="width:100%;  border-style: none;">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 75px; ">#</th>
                                        @foreach($kriteria as $k)
                                        <th>{{ $k->kode_kriteria }}</th>
                                        @endforeach
                                        <th >Jumlah</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $kd = 1; $a = 0; ?>
                                    @foreach($data as $k)
                                    <tr data-label="{{ $k->kode_kriteria }}">
                                        <td class="text-center">{{$k->kode_alternatif}}</td>
                                        <?php $total = 0; ?>
                                        @foreach($kriteria as $l)
                                            <th>{{ getNilaiAlternatif($k->kode_alternatif, $l->kode_kriteria) }}</th>
                                            <?php $total += getNilaiAlternatif($k->kode_alternatif, $l->kode_kriteria); ?>
                                        @endforeach
                                        <td class="text-center">{{ number_format($total,2) }}</td>
                                        <td class="text-center"> <a href="{{ url('bobot/alternatif/edit/'. $k->id_alternatif) }}" class="btn btn-sm btn-info">Edit</a></td>

                                    </tr>
                                    <?php $kd++; ?>
                                    @endforeach
                                </tbody>

                            </table>

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

        $('.select2').select2()
        $(document).on('click','.btn-reset', function(){
            $('.nilai').val(0)
            $('.total').val(0)
        })

        $(document).on('change', '.nilai', function () {
            let t = $(this).closest('td').index();
            let label = $(this).closest('tr').attr('data-label');
            summaryTotal(t, label)
        })
        $('.atribute').select2({
            placeholder: 'Pilih Kriteria',
            ajax: {
                url: "{{ url('kriteria/select2') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama_kriteria + ' - ' + item.kode_kriteria,
                                id: item.kode_kriteria
                            }
                        })
                    };
                },
                cache: true
            }
        }).on('select2:select', function (e) {
            setValue()
        });
        $('.atribute1').select2({
            placeholder: 'Pilih Kriteria',
            ajax: {
                url: "{{ url('kriteria/select2') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama_kriteria + ' - ' + item.kode_kriteria,
                                id: item.kode_kriteria
                            }
                        })
                    };
                },
                cache: true
            }
        }).on('select2:select', function (e) {
            setValue();
        });

        // $('.ls-toggle-btn').trigger('click')
    })

    function setValue() {
        let colAwal = $('.atribute').val();
        let rowAwal = $('.atribute1').val();
        console.log(colAwal);
        console.log(rowAwal);
        let nilaiBobot = $('.nilai-bobot').val();
        if (colAwal != null && rowAwal != null) {
            $('#ngoding').find('tbody').find('.col-' + rowAwal + '-' + colAwal).val(nilaiBobot);
            $('#ngoding').find('tbody').find('.row-' + rowAwal + '-' + colAwal).val(parseFloat(1 / nilaiBobot));
            $('.nilai').trigger('change');
        }

    }

    function summaryTotal(index) {
        let io = 0;
        $('#ngoding').find('tbody').find('td:nth-child(' + (index + 1) + ')').each(function () {
            let nilai = parseFloat($(this).find('.nilai').inputmask('unmaskedvalue') || 0);
            io += nilai;
        });
        $('#ngoding').find('tfoot').find('th:nth-child(' + (index + 1) + ')').find('.total').val(io);


    }

</script>
@endsection
