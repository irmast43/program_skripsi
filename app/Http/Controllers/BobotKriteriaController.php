<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotKriteriaModels;
use App\Models\KriteriaModels;
use App\Models\CalculateModels;
use Illuminate\Support\Facades\DB;
use App\Models\TotalKriteria;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kriteria = KriteriaModels::all();
        $bobotKriteria = CalculateModels::join('kriteria', 'kriteria.kode_kriteria','calculate_kriteria.parrent')->orderby('kriteria.created_at','ASC')->get();
        $mappingBobot = array();
        foreach($bobotKriteria as $k){
            $mappingBobot[$k->kode][] = $k;
        }

        $mappingTotalKriteria = array();
        foreach($bobotKriteria as $t){
            $mappingTotalKriteria[$t->parrent][$t->kode] = $t->nilai;
        }
        return view('bobot-kriteria.index', compact('mappingBobot','kriteria','mappingTotalKriteria'));
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
  

        $bobot = $request->bobot;
        $no = 1;
        foreach ($bobot as $key => $value) {
            $jumlah = 0;
            foreach($value[$key] as $parrent => $nilai){
                CalculateModels::where('kode', $key)->where('parrent',$parrent)->update([
                    'nilai' => $nilai
                ]);
                $jumlah += $nilai;
            }
        }
        toastr()->success('Nilai bobot kriteria berhasil ditambahkan');
        return redirect('bobot/kriteria');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
