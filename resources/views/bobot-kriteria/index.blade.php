@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Nilai Bobot Kriteria AHP</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Nilai Bobot Kriteria AHP</a></li>
                    <li class="breadcrumb-item active">Nilai Bobot Kriteria AHP</li>
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
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <select class="form-control show-tick ms atribute">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <select class="form-control nilai-bobot show-tick ms select2"
                                    data-placeholder="Pilih Bobot" onchange="setValue()" name="nilai">
                                    <option value="1">1 - Sama penting dengan</option>
                                    <option value="2">2 - Mendekati sedikit lebih penting dari</option>
                                    <option value="3">3 - Sedikit lebih penting dari</option>
                                    <option value="4">4 - Mendekati lebih penting dari</option>
                                    <option value="5">5 - Lebih penting dari</option>
                                    <option value="6">6 - Mendekati sangat penting dari</option>
                                    <option value="7">7 - Sangat penting dari</option>
                                    <option value="8">8 - Mendekati mutlak dari</option>
                                    <option value="9">9 - Mutlak sangat penting dari</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <select style="width:250px !important;"
                                    class="form-control show-tick ms atribute1"></select>
                            </div>
                            <div class="form-group col-sm-3">
                                <button class="btn btn-warning btn-sm btn-reset"><i class="zmdi zmdi-hc-fw"></i> Reset</button>
                            </div>
                        </div>
                        <form action="{{ url('/bobot/kriteria/store') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                                style="width:100%;  border-style: none;">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 75px; ">#</th>
                                        @foreach($kriteria as $k)
                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $kd = 1; $a = 0; ?>
                                    @foreach($kriteria as $k)
                                    <tr data-label="{{ $k->kode_kriteria }}">
                                        <td class="text-center">{{$k->kode_kriteria}}</td>

                                        @foreach($mappingBobot[$k->kode_kriteria] as $index => $key)
                                        <td><input data-col="{{ $key->parrent }}" data-row="{{ $k->kode_kriteria }}"
                                                name="bobot[{{ $key->kode }}][{{ $key->kode }}][{{ $key->parrent }}]"
                                                value="{{ $key->nilai }}"
                                                data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' "
                                                type="text" style="background: white;"
                                                class="input-mask nilai form-control form-control-sm col-{{$key->parrent}}-{{$k->kode_kriteria}} row-{{$k->kode_kriteria}}-{{$key->parrent}}">
                                        </td>
                                        @endforeach
                                    </tr>
                                    <?php $kd++; ?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        @foreach($kriteria as $l)
                                        <th><input readonly value="{{ array_sum($mappingTotalKriteria[$l->kode_kriteria]) }}" data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' "
                                                type="text" class="input-mask total form-control form-control-sm"></th>
                                        @endforeach
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
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
                url: "{{ url('kriteria/select2/ajax') }}",
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
                url: "{{ url('kriteria/select2/ajax') }}",
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
        $('.nilai').trigger('change');
    })

    function setValue() {
        let colAwal = $('.atribute').val();
        let rowAwal = $('.atribute1').val();
        let nilaiBobot = $('.nilai-bobot').val();
        if (colAwal != null && rowAwal != null) {
            //perbandingan kriteria
            $('#ngoding').find('tbody').find('.col-' + rowAwal + '-' + colAwal).val(nilaiBobot);
            $('#ngoding').find('tbody').find('.row-' + rowAwal + '-' + colAwal).val(1/nilaiBobot);
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
