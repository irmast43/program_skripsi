@extends('index')
@section('page-index')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 class="title">Perhitungan AHP TOPSIS</h2>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                 Matriks Perbandingan berpasangan
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
                                                        @foreach($masterKriteria as $k)
                                                        <th class="table-info">
                                                            <small>{{ strtoupper($k->attribute) }}</small></th>
                                                        @endforeach
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; ">#</th>
                                                        @foreach($masterKriteria as $k)
                                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $noCol = 1; ?>
                                                    @foreach($masterKriteria as $k)
                                                        <tr data-label="{{ $k->kode_kriteria }}">
                                                            <td class="text-center">{{$k->kode_kriteria}} </td>
                                                            
                                                            <?php $h = $noCol++ ; $noRow = 1; ?>
                                                            @foreach($masterKriteria as $key)
                                                            <td <?= $h == $noRow ? 'class="table-success"' : 'class="table-warning"' ?>  > {{ $maapingBobotKriteria[$k->kode_kriteria][$key->kode_kriteria][0] }}</td>
                                                            <?php $noRow++; ?>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                 Matriks Perbandingan berpasangan
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
                                                        @foreach($masterKriteria as $k)
                                                        <th class="table-info">
                                                            <small>{{ strtoupper($k->attribute) }}</small></th>
                                                        @endforeach
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th style="width: 75px; ">#</th>
                                                        @foreach($masterKriteria as $k)
                                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $noCol = 1; ?>
                                                    @foreach($masterKriteria as $k)
                                                        <tr data-label="{{ $k->kode_kriteria }}">
                                                            <td class="text-center">{{$k->kode_kriteria}}</td>
                                                            
                                                            <?php $h = $noCol++ ; $noRow = 1; ?>
                                                            @foreach($masterKriteria as $key)
                                                            <td <?= $h == $noRow ? 'class="table-success"' : '' ?>  > {{ $maapingBobotKriteria[$k->kode_kriteria][$key->kode_kriteria][0] }}</td>
                                                            <?php $noRow++; ?>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="table-info">
                                                        <th>Total</th>
                                                        @foreach($masterKriteria as $l)
                                                        <th>{{ number_format(array_sum($maapingGroupTotalKriteria[$l->kode_kriteria]),2) }}
                                                        </th>
                                                        @endforeach
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Normalisasi Matriks dan Bobot Prioritas
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
                                                        @foreach($masterKriteria as $k)
                                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                                        @endforeach
                                                        <th style="width: 75px; ">Jumlah</th>
                                                        <th style="width: 75px; ">Bobot Perioritas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $mappingArrayJumlahMatrik = array(); ?>
                                                    <?php
                                                        $arrayBobotKriteria = array(); 
                                                        $mappingTotalMatrikPerbandingan = array(); 
                                                        $jumlahMatrikPerbandingan = 0;
                                                        $jumlahBobotMatrikPerbandingan = 0;
                                                        $noCol = 1;
                                                    ?>
                                                    @foreach($masterKriteria as $k)
                                                    <tr data-label="{{ $k->kode_kriteria }}">
                                                        <td class="text-center">{{$k->kode_kriteria}}</td>
                                                        <?php 
                                                            $jumlah = 0; 
                                                            $h = $noCol++ ; $noRow = 1; 
                                                        ?>
                                                        @foreach($masterKriteria as $key)
                                                        <?php   
                                                            $nilai = $maapingBobotKriteria[$k->kode_kriteria][$key->kode_kriteria][0] / array_sum($maapingGroupTotalKriteria[$key->kode_kriteria]);
                                                            $jumlah += $nilai;
                                                            $mappingTotalMatrikPerbandingan[$key->kode_kriteria][] = $nilai; 
                                                        ?>
                                                        <td <?= $h == $noRow ? 'class="table-success"' : '' ?>>{{ number_format($nilai,2) }} </td>
                                                        <?php $noRow++; ?>
                                                        @endforeach
                                                        <?php $mappingArrayJumlahMatrik[$k->kode_kriteria][] = $jumlah; ?>
                                                        <?php 
                                                            $bobotKriteria = $jumlah / count($masterKriteria);
                                                            $jumlahMatrikPerbandingan += $jumlah ;
                                                            $jumlahBobotMatrikPerbandingan += $bobotKriteria;
                                                            $arrayBobotKriteria[$k->kode_kriteria][] = $bobotKriteria;
                                                        ?>
                                                        <th style="width: 75px; ">
                                                            {{ number_format($jumlah,2) }}</th>
                                                        <th style="width: 75px; ">{{ number_format($bobotKriteria,2) }}
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        @foreach($masterKriteria as $l)
                                                        <th>{{ number_format(array_sum($mappingTotalMatrikPerbandingan[$l->kode_kriteria]),2) }}</th>
                                                        @endforeach
                                                        <th>{{ number_format($jumlahMatrikPerbandingan,2) }}</th>
                                                        <th>{{ number_format($jumlahBobotMatrikPerbandingan,2) }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Perkalian Matrix
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
                                                        @foreach($masterKriteria as $k)
                                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                                        @endforeach
                                                        <th style="width: 75px; ">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $mappingArrayJumlahPerkalianMatrik = array(); ?>
                                                    @foreach($masterKriteria as $k)
                                                    <tr data-label="{{ $k->kode_kriteria }}">
                                                        <td class="text-center">{{$k->kode_kriteria}}</td>
                                                        <?php $jumlahMatrik = 0; ?>
                                                        @foreach($masterKriteria as $key)
                                                        <?php 
                                                            $nilai = $maapingBobotKriteria[$k->kode_kriteria][$key->kode_kriteria][0] * $arrayBobotKriteria[$key->kode_kriteria][0];  
                                                            $jumlahMatrik += $nilai;
                                                        ?>
                                                        <td>{{ number_format($nilai,2) }}</td>
                                                        @endforeach
                                                        <?php $mappingArrayJumlahPerkalianMatrik[$k->kode_kriteria][] = $jumlahMatrik; ?>
                                                        <td style="width: 75px; ">{{ number_format($jumlahMatrik,2) }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Rasio Konsistensi
                                            </a>
                                        </h5>
                                    </div>

                                    <div class="collapse show" id="collapseExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <table id="ngoding"
                                                        class="table table-sm table-bordered table-striped table-hover"
                                                        style="width:100%;  border-style: none;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th style="width: 75px; ">#</th>
                                                                <th style="width: 75px; ">P. Vektor</th>
                                                                <th style="width: 75px; ">Bobot Prioritas</th>
                                                                <th style="width: 75px; ">Eigen Vektor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $jumlahHasil = 0; ?>
                                                            @foreach($masterKriteria as $k)
                                                            <?php 
                                                                $jumlah = $mappingArrayJumlahMatrik[$k->kode_kriteria][0];
                                                                $bobot = $arrayBobotKriteria[$k->kode_kriteria][0];
                                                                $perkalianMatrik = $mappingArrayJumlahPerkalianMatrik[$k->kode_kriteria][0];
                                                                $hasil = $perkalianMatrik / $bobot;
                                                                $jumlahHasil += $hasil; 
                                                            ?>
                                                            <tr data-label="{{ $k->kode_kriteria }}">
                                                                <td class="text-center">{{$k->kode_kriteria}}</td>
                                                                <td style="width: 75px; ">{{ number_format($jumlah,6) }}</td>
                                                                <td style="width: 75px; ">{{ number_format($bobot,6) }}</td>
                                                                <td style="width: 75px; ">{{ number_format($hasil,2) }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="3">Jumlah</td>
                                                                <td colspan="3">{{ number_format($jumlahHasil,2) }}</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-sm-6">
                                                    <?php 
                                                        $totalMasterKriteria = count($masterKriteria);
                                                        $lamda =  $jumlahHasil > 0 ? $jumlahHasil / $totalMasterKriteria : 0;    
                                                        $ci = $lamda > 0 ? ($lamda-$totalMasterKriteria) / ($totalMasterKriteria -1) : 0;
                                                    ?>
                                                    <table>
                                                        <tr>
                                                            <th>LAMDA MAX </th>
                                                            <th> : {{ number_format($lamda,6) }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>CI </th>
                                                            <th> : {{ number_format($ci,6) }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>CR </th>
                                                            <th> : {{ number_format($ci/1.45,6) }}</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Perhitungan TOPSIS
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 75px; ">#</th>
                                                                    @foreach($masterKriteria as $k)
                                                                    <th style="width: 75px; ">{{ $k->kode_kriteria }}</th>
                                                                    @endforeach
                                                                    <th style="width: 75px; ">Jumlah</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $arrayAkarToposis = array(); ?>
                                                                @foreach($masterAlternatif as $t)
                                                                <tr>
                                                                    <td>{{ $t->kode_alternatif }}</td>
                                                                    <?php $jumlah = 0; ?>
                                                                    @foreach($masterKriteria as $k)
                                                                    <?php 
                                                                        $nilai = $maapingBobotAlternatif[$t->kode_alternatif][$k->kode_kriteria][0]; 
                                                                        $jumlah += $nilai;
                                                                        $arrayAkarToposis[$k->kode_kriteria][] = pow($nilai,2);
                                                                        ?>
                                                                    <td>{{ number_format($nilai,2) }}</td>
                                                                    @endforeach
                                                                    <td>{{ number_format($jumlah,2) }}</td>
                                                                    
                                                                </tr>
                                                                
                                                                @endforeach
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Normalisasi Matriks
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 75px; ">#</th>
                                                                    @foreach($masterKriteria as $k)
                                                                    <th style="width: 75px; ">{{ $k->kode_kriteria }}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($masterAlternatif as $t)
                                                                <tr>
                                                                    <td>{{ $t->kode_alternatif }}</td>
                                                                    @foreach($masterKriteria as $k)
                                                                    <?php 
                                                                        $nilaiMatrik = $maapingBobotAlternatif[$t->kode_alternatif][$k->kode_kriteria][0]; 
                                                                        $nilaiPangkat = array_sum($arrayAkarToposis[$k->kode_kriteria]);
                                                                        $nilai = $nilaiMatrik/ sqrt($nilaiPangkat);
                                                                    ?>
                                                                    <td>{{ number_format($nilai,2) }}</td>
                                                                    @endforeach

                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Normalisasi Matriks Terbobot
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 75px; ">#</th>
                                                                    @foreach($masterKriteria as $k)
                                                                    <th style="width: 75px; ">{{ $k->kode_kriteria }}</th>
                                                                    @endforeach
                                                                    <th style="width: 75px; ">Jumlah</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                    $array2MatrixBobot = array();
                                                                ?>
                                                                @foreach($masterAlternatif as $t)
                                                                <tr>
                                                                    <td>{{ $t->kode_alternatif }}</td>
                                                                    <?php  
                                                                        $jumlahNormalisasi = 0; 
                                                                    ?>
                                                                    @foreach($masterKriteria as $k)
                                                                    <?php 
                                                                        $nilaiMatrik = $maapingBobotAlternatif[$t->kode_alternatif][$k->kode_kriteria][0]; 
                                                                        $nilaiPangkat = array_sum($arrayAkarToposis[$k->kode_kriteria]);
                                                                        $totalBobotKriteria = $arrayBobotKriteria[$k->kode_kriteria][0];
                                                                        $nilai = $nilaiMatrik / sqrt($nilaiPangkat);
                                                                        $nilaiNormalisasi = $nilai * $totalBobotKriteria;
                                                                        $jumlahNormalisasi += $nilaiNormalisasi;
                                                                        $arrayNilaiNormalisasiKriteria[$k->kode_kriteria][] = $nilaiNormalisasi;
                                                                        $array2MatrixBobot[$t->kode_alternatif][$k->kode_kriteria][] = $nilaiNormalisasi;
                                                                    ?>
                                                                    <td>{{ number_format($nilaiNormalisasi,6) }}</td>
                                                                    @endforeach
                                                                    <td style="width: 75px; ">{{ number_format($jumlahNormalisasi,6) }}</td>

                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="display:none" class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Solusi ideal Positif dan Solusi Ideal negatif
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 75px; ">#</th>
                                                                    @foreach($masterKriteria as $k)
                                                                    <th style="width: 75px; ">{{ $k->kode_kriteria }}</th>
                                                                    @endforeach
                                                                    <th style="width: 75px; ">Jumlah</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>A+</td>
                                                                    <?php 
                                                                        $jumlah = 0;
                                                                        $arrayDplus = array();
                                                                        $arrayDmin = array(); 
                                                                    ?>
                                                                    @foreach($masterKriteria as $l)
                                                                    <?php 
                                                                        $bobotKriteriaArr = $arrayNilaiNormalisasiKriteria[$l->kode_kriteria];
                                                                        $nilai = $l->attribute == 'benefit' ? min($bobotKriteriaArr) : max($bobotKriteriaArr);
                                                                        $arrayDplus[$l->kode_kriteria][] = $nilai;
                                                                        $jumlah += $nilai; 
                                                                    ?>
                                                                    <th style="width: 75px; ">{{ number_format($nilai,2) }}</th>
                                                                    @endforeach
                                                                    <th style="width: 75px; ">{{ number_format($jumlah,2) }}</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>A-</td>
                                                                    <?php $jumlah = 0; ?>
                                                                    @foreach($masterKriteria as $l)
                                                                    <?php 
                                                                        $bobotKriteriaArr = $arrayNilaiNormalisasiKriteria[$l->kode_kriteria];
                                                                        $nilai = $l->attribute == 'benefit' ? max($bobotKriteriaArr) : min($bobotKriteriaArr);
                                                                        $arrayDmin[$l->kode_kriteria][] = $nilai;
                                                                        $jumlah += $nilai; 
                                                                    ?>
                                                                    <th style="width: 75px; ">{{ number_format($nilai,2) }}</th>
                                                                    @endforeach
                                                                    <th style="width: 75px; ">{{ number_format($jumlah,2) }}</th>
                                                                </tr>
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php  
                                $att = array(); 
                                foreach($array2MatrixBobot as $key => $val) { 
                                    $total = 0;
                                    foreach($val as $k => $nilai){
                                        $total +=  pow( ($arrayDplus[$k][0] - $nilai[0]),2);
                                    }    
                                    $att[$key][] = $total;
                                } 
                                $attMin = array(); 
                                foreach($array2MatrixBobot as $key => $val) { 
                                    $total = 0;
                                    foreach($val as $k => $nilai){
                                        $total +=  pow( ($arrayDmin[$k][0] - $nilai[0]),2);
                                    }    
                                    $attMin[$key][] = $total;
                                } 
                            ?>
                            <div style="display:none" class="col-sm-6">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Jarak Solusi Ideal Positif dan Jarak Solusi Ideal Negatif
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 50px; ">#</th>
                                                                    <th style="width: 75px; ">D+</th>
                                                                    <th style="width: 75px; ">D-</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                    $arrayMappingRangking = array(); 
                                                                ?>
                                                                @foreach($masterAlternatif as $k)
                                                                <tr>
                                                                    <?php 
                                                                        $y = new stdClass();
                                                                        $y->nilai = $attMin[$k->kode_alternatif][0] > 0 ? sqrt($attMin[$k->kode_alternatif][0]) / (sqrt($attMin[$k->kode_alternatif][0]) + sqrt($att[$k->kode_alternatif][0])) : 0;
                                                                        $y->kode_alternatif = $k->kode_alternatif;
                                                                        $arrayMappingRangking[] = $y; 
                                                                    ?>
                                                                    <td >{{ $k->kode_alternatif }}</td>
                                                                    <td>{{ number_format(sqrt($att[$k->kode_alternatif][0]),2) }}</td>
                                                                    <td>{{ number_format(sqrt($attMin[$k->kode_alternatif][0]),6)}}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php 
                                arsort($arrayMappingRangking);
                                $mappingRangkingAHPTOPOSIS = array();
                                $i = 1;
                                foreach($arrayMappingRangking as $k){
                                    $mappingRangkingAHPTOPOSIS[$k->kode_alternatif][] = $i++;
                                }
                            ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link" data-toggle="collapse" href="#rasioKonsistensi"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Nilai Preferensi Dan perangkingan
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="rasioKonsistensi">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-1"><button data-tp="pdf" class="btn btn-sm btn-info btn-cetak">Pdf</button></div>
                                                <div class="col-sm-6"><button data-tp="excel" class="btn btn-sm btn-info btn-cetak">Excel</button></div>
                                                <div class="col-sm-12">
                                                <form id="table-rangking" target="_blank" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-rangking table-sm table-bordered table-striped table-hover"
                                                            style="width:100%;  border-style: none;">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="width: 50px; ">#</th>
                                                                    <th style="width: 75px; ">Prefensi</th>
                                                                    <th style="width: 75px; ">Ranking</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($masterAlternatif as $ind => $k)
                                                                <?php 
                                                                    $prefensi = sqrt($attMin[$k->kode_alternatif][0]) > 0 ? sqrt($attMin[$k->kode_alternatif][0]) / (sqrt($attMin[$k->kode_alternatif][0]) + sqrt($att[$k->kode_alternatif][0])) : 0;
                                                                ?>
                                                                <tr>
                                                                    <td>{{ $k->kode_alternatif }}
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][kode_alternatif]" value="{{ $k->kode_alternatif }}"/>
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][prefensi]" value="{{ $prefensi }}"/>
                                                                        <input type="hidden" name="data_rangking[{{ $ind }} ][rangking]" value="{{ $mappingRangkingAHPTOPOSIS[$k->kode_alternatif][0] }}"/>

                                                                    </td>
                                                                    <td>{{ number_format($prefensi,6) }}</td>
                                                                    <td>{{ $mappingRangkingAHPTOPOSIS[$k->kode_alternatif][0] }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                           
                                                        </table>

                                                    </div>
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
@endsection

@section('page-js')
<script>
    $(document).ready(function () {
        $(document).on('click','.btn-cetak', function(){
            let type = $(this).attr('data-tp');
            if(type == 'pdf'){
                $('#table-rangking').attr('action',"{{ url('cetak/rangking/pdf') }}")
                $('#table-rangking').submit();
            }
            if(type == 'excel'){
                $('#table-rangking').attr('action',"{{ url('cetak/rangking/excel') }}")
                $('#table-rangking').submit();
            }
        })
        let asset_url = "{{ url('') }}"
        $('.table-rangking').dataTable({
            iDisplayLength: -1,
            searching: false, paging: false, info: false
         })

    })

</script>
@endsection
