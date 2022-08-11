<?php

namespace App\Http\Controllers;

use App\Models\BobotCoprasModels;
use App\Models\KriteriaModels;
use Illuminate\Http\Request;

class CoprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = KriteriaModels::leftjoin('bobot_copras as t','t.kode_kriteria','kriteria.kode_kriteria')->select('kriteria.kode_kriteria','t.nilai')->orderby('kriteria.created_at','asc')->get();
        return view('bobot-copras.index', compact('kriteria'));
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
        BobotCoprasModels::truncate();
        $total = $request->total;
        foreach($total as $t => $y){
            BobotCoprasModels::insert([
                'kode_kriteria' => $t,
                'nilai' => $y,
            ]);
        }
        toastr()->success('Nilai bobot kriteria berhasil ditambahkan');
        return redirect('bobot/copras/index');
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
