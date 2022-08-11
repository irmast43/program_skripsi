@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Perhitungan COPRAS</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Perhitungan</a></li>
                    <li class="breadcrumb-item active">Perhitungan</li>
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
                            <div class="col-sm-12" style="display:none">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Matriks Keputusan
                                            </a>
                                        </h5>
                                    </div>

                                    <div class="collapse show" id="collapseExample">
                                        <div class="card-body">
                                            <table id="ngoding"
                                                class="table table-sm table-bordered table-striped table-hover"
                                                style="width:100%;  border-style: none;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; "></th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th class="table-info">{{ strtoupper($value->attribute) }} </th>
                                                        @endforeach
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; ">#</th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th>{{ $k }} </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($alternatifMaster as $t)
                                                    <tr>
                                                        <td>{{ $t->kode_alternatif }}</td>
                                                        <?php $arrayTotalCopras = array(); ?>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th scope="col">
                                                            {{ $mapingnilaialternatif[$t->kode_alternatif][$k][0]->nilai }}
                                                        </th>
                                                        @endforeach

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 75px; ">Total</th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th class="table-success">
                                                            {{ number_format(array_sum($totalCopras[$k]),2) }}</th>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 75px; ">Bobot</th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th class="table-warning">
                                                            {{ number_format( $totalBobtoCopras[$k][0],2 ) }}</th>
                                                        @endforeach
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display:none">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Normalisasi Matriks
                                            </a>
                                        </h5>
                                    </div>

                                    <div class="collapse show" id="collapseExample">
                                        <div class="card-body">
                                            <table id="ngoding"
                                                class="table table-sm table-bordered table-striped table-hover"
                                                style="width:100%;  border-style: none;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; ">#</th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th>{{ $k }} </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($alternatifMaster as $t)
                                                    <tr>
                                                        <td>{{ $t->kode_alternatif }}</td>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th scope="col">
                                                            {{ number_format($mapingnilaialternatif[$t->kode_alternatif][$k][0]->nilai / array_sum($totalCopras[$k]),2)  }}
                                                        </th>
                                                        @endforeach

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display:none">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Normalisasi Matriks Terbobot
                                            </a>
                                        </h5>
                                    </div>

                                    <div class="collapse show" id="collapseExample">
                                        <div class="card-body">
                                            <table id="ngoding"
                                                class="table table-sm table-bordered table-striped table-hover"
                                                style="width:100%;  border-style: none;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; ">#</th>
                                                        @foreach($mappingBobot as $k => $value)
                                                        <th>{{ $k }} </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $arrayJumlahNormalisasiMatrixCost = array(); $jumlahCost = 0; ?>
                                                    <?php  $arrayJumlahNormalisasiMatrixBenefit = array(); $jumlahBenefit = 0; ?>
                                                    @foreach($alternatifMaster as $t)
                                                    <tr>
                                                        <td>{{ $t->kode_alternatif }}</td>

                                                        @foreach($mappingBobot as $k => $value)
                                                        <?php $nilaiMatrixNormalisasi = $mapingnilaialternatif[$t->kode_alternatif][$k][0]->nilai / array_sum($totalCopras[$k]); ?>
                                                        <?php
                                                                if($value->attribute == 'cost'){
                                                                    $arrayJumlahNormalisasiMatrixCost[$t->kode_alternatif][] = $nilaiMatrixNormalisasi * $totalBobtoCopras[$k][0];
                                                                }
                                                                if($value->attribute == 'benefit'){
                                                                    $arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif][] = $nilaiMatrixNormalisasi * $totalBobtoCopras[$k][0];
                                                                }
                                                            ?>
                                                        <th scope="col">
                                                            {{ number_format($nilaiMatrixNormalisasi * $totalBobtoCopras[$k][0],2)  }}
                                                        </th>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display:none">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a class="btn btn-link" data-toggle="collapse"
                                                        href="#collapseExample" role="button" aria-expanded="false"
                                                        aria-controls="collapseExample">
                                                        Minimal dan Maksimal Index
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="collapse show" id="collapseExample">
                                                <div class="card-body">
                                                    <table id="ngoding"
                                                        class="table table-sm table-bordered table-striped table-hover"
                                                        style="width:100%;  border-style: none;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th style="width: 75px; ">#</th>
                                                                <th>S + i</th>
                                                                <th>S - i</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $totalSmin = 0; ?>
                                                            @foreach($alternatifMaster as $t)
                                                            <tr>
                                                                <td>{{ $t->kode_alternatif }}</td>
                                                                <td> {{ number_format(array_sum($arrayJumlahNormalisasiMatrixCost[$t->kode_alternatif]),2) }}
                                                                </td>
                                                                <td> {{ number_format(array_sum($arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif]),2) }}
                                                                </td>
                                                                <?php $totalSmin += array_sum($arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif]); ?>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                <th></th>
                                                                <th class="table-success">
                                                                    {{ number_format($totalSmin,2) }}</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a class="btn btn-link" data-toggle="collapse"
                                                        href="#collapseExample" role="button" aria-expanded="false"
                                                        aria-controls="collapseExample">
                                                        Prioritas Alternatif
                                                    </a>
                                                </h5>
                                            </div>

                                            <?php $total1Si = 0; ?>
                                            @foreach($alternatifMaster as $t)
                                            <?php $total1Si += 1/array_sum($arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif]); ?>
                                            @endforeach
                                            <div class="collapse show" id="collapseExample">
                                                <div class="card-body">
                                                    <table id="ngoding"
                                                        class="table table-sm table-bordered table-striped table-hover"
                                                        style="width:100%;  border-style: none;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th style="width: 75px; ">#</th>
                                                                <th>1/s-i</th>
                                                                <th>Si*(sigma1/s-i)</th>
                                                                <th>(Sigma S-1)/s-1*(sigma1/s-1)</th>
                                                                <th>Qi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $findMaxValue = array(); ?>
                                                            <?php $temporaryArrayQ1 = array(); ?>
                                                            @foreach($alternatifMaster as $t)
                                                            <tr>
                                                                <td>{{ $t->kode_alternatif }}</td>
                                                                <?php   $col1 = 1 / array_sum($arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif]);
                                                                        $col2 = array_sum($arrayJumlahNormalisasiMatrixBenefit[$t->kode_alternatif]) * $total1Si;
                                                                        $col3 = $totalSmin / $col2 ;
                                                                        $col4 = array_sum($arrayJumlahNormalisasiMatrixCost[$t->kode_alternatif]) +$col3;
                                                                        $findMaxValue[] = $col4;
                                                                        $temporaryArrayQ1[$t->kode_alternatif][] = $col4;
                                                                ?>
                                                                <td> {{ number_format($col1,2) }} </td>
                                                                <td> {{ number_format($col2,2) }} </td>
                                                                <td> {{ number_format($col3,2) }} </td>
                                                                <td> {{ number_format($col4,2) }} </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                <th>{{ number_format($total1Si,2) }}</th>
                                                                <th colspan="3"></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Q Max</th>
                                                                <th colspan="3"></th>
                                                                <th>{{ !empty($findMaxValue) ? number_format(max($findMaxValue),2) : 0 }}
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a class="btn btn-link" data-toggle="collapse"
                                                        href="#collapseExample" role="button" aria-expanded="false"
                                                        aria-controls="collapseExample">
                                                        Utilitas Kuantitatif
                                                    </a>
                                                </h5>
                                            </div>
                                            <?php $arrayRangking = array(); ?>
                                            @foreach($alternatifMaster as $t)
                                            <?php
                                                $y = new stdClass();
                                                $y->nilai = $temporaryArrayQ1[$t->kode_alternatif][0] / max($findMaxValue);
                                                $y->kode = $t->kode_alternatif;
                                                $arrayRangking[] = $y;
                                            ?>
                                            @endforeach
                                            <?php
                                                $no=1;
                                                $mappingRangking = array();
                                                arsort($arrayRangking);
                                            ?>
                                            @foreach($arrayRangking as $k)
                                            <?php $mappingRangking[$k->kode][] = $no++  ?>
                                            @endforeach

                                            <div class="collapse show" id="collapseExample">
                                                <div class="card-body">
                                                    <div class="row">


                                                    <div class="col-sm-1"><button data-tp="pdf"
                                                            class="btn btn-sm btn-info btn-cetak">Pdf</button></div>
                                                    <div class="col-sm-6"><button data-tp="excel"
                                                            class="btn btn-sm btn-info btn-cetak">Excel</button></div>
                                                    <div class="col-sm-12">
                                                        <form id="table-rangking" target="_blank" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <table
                                                                class="table-rangking table table-sm table-bordered table-striped table-hover"
                                                                style="width:100%;  border-style: none;">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th style="width: 75px; ">#</th>
                                                                        <th>UI</th>
                                                                        <th>Rangking</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($alternatifMaster as $ind => $t)
                                                                    <tr>
                                                                        <td>{{ $t->kode_alternatif }}</td>
                                                                        <td> {{ number_format( ($temporaryArrayQ1[$t->kode_alternatif][0] / max($findMaxValue)),2) }}
                                                                        </td>
                                                                        <td>{{ $mappingRangking[$t->kode_alternatif][0] }}
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][kode_alternatif]" value="{{ $t->kode_alternatif }}"/>
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][ui]" value="{{ ($temporaryArrayQ1[$t->kode_alternatif][0] / max($findMaxValue)) }}"/>
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][rangking]" value="{{ $mappingRangking[$t->kode_alternatif][0] }}"/>
                                                                        </td>
                                                                    </tr>
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
                            </div>

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
        $(document).on('click', '.btn-cetak', function () {
            let type = $(this).attr('data-tp');
            if (type == 'pdf') {
                $('#table-rangking').attr('action', "{{ url('cetak/rangking/copras/pdf') }}")
                $('#table-rangking').submit();
            }
            if (type == 'excel') {
                $('#table-rangking').attr('action', "{{ url('cetak/rangking/copras/excel') }}")
                $('#table-rangking').submit();
            }
        })
        let asset_url = "{{ url('') }}"
        $('.table-rangking').dataTable({
            iDisplayLength: -1,
            searching: false,
            paging: false,
            info: false
        })

    })

</script>
@endsection
