<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModels;
use Illuminate\Http\Request;
use App\Models\BobotAlternatifModels;
use App\Models\CalculateAlternatifModels;
use App\Models\KriteriaModels;
use App\Models\CalculateModels;
use DB;
class BobotAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select ta.kode_kriteria, tb.kode_alternatif ,tb.nilai from kriteria  ta LEFT JOIN calculate_alternatif tb on ta.kode_kriteria = tb.kriteria and tb.kriteria order by ta.created_at asc";
        $kriteria = DB::select($sql);

        $r = array();
        foreach($kriteria as $l){
            $r[$l->kode_kriteria][$l->kode_alternatif][] = $l;
        }

       $data =  AlternatifModels::all();
       

        return view('bobot-alternatif.index', compact('data','r','kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = BobotAlternatifModels::join('alternatif As ta', 'ta.id_alternatif', 'bobot_alternatif.id_alternatif')->where('ta.id_alternatif', $id)->first();
        $data = AlternatifModels::where('id_alternatif', $id)->first();
        $sql = "select ta.kode_kriteria, tb.nilai from kriteria  ta LEFT JOIN calculate_alternatif tb on ta.kode_kriteria = tb.kriteria and tb.kode_alternatif = '$data->kode_alternatif' order by ta.created_at asc";
        $kriteria = DB::select($sql);
        

        return view('bobot-alternatif.edit-bobot-alternatif', compact('kriteria', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $data = AlternatifModels::where('id_alternatif',$request->id_alternatif)->first();
       CalculateAlternatifModels::where('kode_alternatif', $data->kode_alternatif)->delete();

       foreach($request->total as $key => $l){
            CalculateAlternatifModels::insert([
                'kode_alternatif'   => $data->kode_alternatif,
                'kriteria'  => $key,
                'nilai' => $l
            ]);
       }

        toastr()->success('Edit nilai bobot alternatif berhasil');
        return redirect('bobot/alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
