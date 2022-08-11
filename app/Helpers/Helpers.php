<?php 

function at($array){
    $object = (object) $array;
    return $object;
}

function dataKriteria($kode_atribute){
    return \DB::table('kriteria')->where('kode_kriteria', $kode_atribute)->first();
}
function printJSON($v){
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json");
    echo json_encode($v, JSON_PRETTY_PRINT);
    exit;
}

function getNilaiAlternatif($alternatif, $kriteria){
    $data = \DB::table('calculate_alternatif')->where('kode_alternatif', $alternatif)->where('kriteria', $kriteria)->first();
    if(isset($data))return $data->nilai;
    else return 0;
}


function dashboard(){
    $kriteria = \DB::table('kriteria')->count();
    $alternatif = \DB::table('alternatif')->count();

    $y = new stdClass();
    $y->total_krit = $kriteria;
    $y->total_alt = $alternatif;

    return $y;
}
?>