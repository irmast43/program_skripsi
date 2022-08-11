<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModels;
use App\Models\BobotCoprasModels;
use Illuminate\Http\Request;
use App\Models\KriteriaModels;
use App\Models\BobotKriteriaModels;
use App\Models\CalculateAlternatifModels;
use App\Models\CalculateModels;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\GroupUse;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = KriteriaModels::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url("kriteria/edit/".$row->id_kriteria) .'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn .= ' <button data-id="'. $row->id_kriteria .'" class="btn-hapus btn btn-danger btn-sm">Delete</button>';
                            return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make();
         }
         
        return view('kriteria.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.add');
    }

    public function cetakPdf()
    {
        $data = KriteriaModels::all();
 
        $pdf = PDF::loadview('kriteria.kriteria_pdf',['data'=>$data]);
        return $pdf->stream();
    }
    public function cetakExcel()
    {
        $data = KriteriaModels::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells("A1:D1")->setCellValue('A1', 'Master Data Kriteria');
        $sheet->mergeCells("A2:D2")->setCellValue('A2', ' ');
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kode Kriteria');
        $sheet->setCellValue('C3', 'Nama Kriteria');
        $sheet->setCellValue('D3', 'Attribute');
         
        $i = 4;
        $no = 1;
        foreach($data as $p)
        {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $p->kode_kriteria);
            $sheet->setCellValue('C'.$i, ucfirst($p->nama_kriteria));
            $sheet->setCellValue('D'.$i, strtoupper($p->attribute));	
            $i++;
        }
         
        $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
        $i = $i - 1;
        $endCeel = 'D';
        foreach (range('A', $endCeel) as $columnID) {
            $sheet->getColumnDimension($columnID)
            ->setAutoSize(true);
        }
        $sheet->getStyle('A3:D'.$i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=Master Data Kriteria.xlsx');
        $writer->save('php://output');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        // CalculateModels::where('parrent','!=', null)->delete();
        $cekData = KriteriaModels::where('kode_kriteria', $request->kode_kriteria)->count();
        
        if($cekData == 0){
            try{
                $kriteria = KriteriaModels::create([
                    'nama_kriteria' => $request->nama_kriteria,
                    'kode_kriteria' => $request->kode_kriteria,
                    'attribute' => $request->attribute_kriteria,
                ]);

                //tambah data bobot kriteria baru
                $allKriteriaParrent = KriteriaModels::all();
                foreach ($allKriteriaParrent as $key) {
                    CalculateModels::insert([
                        'kode' => $key->kode_kriteria,
                        'nilai' => 1,
                        'parrent'   => $request->kode_kriteria
                    ]);
                }

                // add to bobot alternatif
                $alternatif = AlternatifModels::all();
                foreach($alternatif as $t){
                    CalculateAlternatifModels::insert([
                        'kode_alternatif' => $t->kode_alternatif,
                        'kriteria'  => $request->kode_kriteria,
                        'nilai'    => 1 
                    ]);
                }

                BobotCoprasModels::insert([
                    'kode_kriteria' => $request->kode_kriteria,
                    'nilai' => 1
                ]);

                //selesai

                //menambhakan bobot kriteria baru kedalam data yang sudah ada

                $allKriteria = CalculateModels::where('parrent' ,'!=', $request->kode_kriteria)->get();
                $grupData = array();
                foreach ($allKriteria as $key) {
                    $grupData[$key->parrent][] = $key;
                }

                foreach($grupData as $t => $i){
                    CalculateModels::where('parrent', $t)->delete();
                    array_push($i, array(
                        'kode' => $request->kode_kriteria,
                        'parrent'   => $t,
                        'nilai' => 1,
                        'updated_at' => date('Y-m-d H:i:s')
                    ));
                    foreach($i as $s){
                        $s = at($s);
                        // printJSON($s);
                        CalculateModels::insert([
                            'kode'  => $s->kode,
                            'nilai' => $s->nilai,
                            'parrent'   => $s->parrent,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);

                    }
                }
              
                DB::commit();
                toastr()->success('Kriteria berhasil ditambahkan');
                return redirect('kriteria');
            }catch(\Exception $e){
                DB::rollback();
                toastr()->success('Eror '. $e->getMessage());
                printJSON($e->getMessage());
                return redirect('kriteria');
            }
        }else{
            toastr()->info('Kode kriteria sudah ada');
            return redirect()->back();
        }
        // dd($request->all());

        
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
        $data = KriteriaModels::where('id_kriteria', $id)->first();
        return view('kriteria.edit', compact('data'));
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
        DB::beginTransaction();
        $data = KriteriaModels::where('id_kriteria', $request->id_kriteria)->first();
        $cekData = KriteriaModels::where('kode_kriteria', $request->kode_kriteria)->where('id_kriteria','!=', $request->id_kriteria)->count();
        if($cekData == 0){
            try{
                $kriteria = KriteriaModels::where('id_kriteria', $request->id_kriteria)->update([
                    'nama_kriteria' => $request->nama_kriteria,
                    'kode_kriteria' => $request->kode_kriteria,
                    'attribute' => $request->attribute_kriteria,
                ]);
                BobotCoprasModels::where('kode_kriteria', $data->kode_kriteria )->update([
                    'kode_kriteria' => $request->kode_kriteria
                ]);
                
                CalculateAlternatifModels::where('kriteria', $data->kode_kriteria )->update([
                    'kriteria' => $request->kode_kriteria
                ]);

                CalculateModels::where('parrent', $data->kode_kriteria )->update([
                    'parrent' => $request->kode_kriteria
                ]);
                
                CalculateModels::where('kode', $data->kode_kriteria )->update([
                    'kode' => $request->kode_kriteria
                ]);

                DB::commit();
                toastr()->success('Kriteria berhasil diperbarui');
                return redirect('kriteria');
            }catch(\Exception $e){
                DB::rollback();
                toastr()->success('Eror '. $e->getMessage());
                return redirect('kriteria');
            }
        }else{
            toastr()->info('Kode kriteria sudah ada');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KriteriaModels::where('id_kriteria', $id)->first();

        CalculateModels::where('parrent', $data->kode_kriteria)->delete();
        CalculateModels::where('kode', $data->kode_kriteria)->delete(); 
        CalculateAlternatifModels::where('kriteria', $data->kode_kriteria)->delete();
        BobotCoprasModels::where('kode_kriteria', $data->kode_kriteria)->delete();
        KriteriaModels::where('id_kriteria', $id)->delete();
        
        toastr()->success('Kriteria berhasil dihapus');
        return redirect('kriteria');

    }
    public function select2(Request $request)
    {
    	$data = [];
        $search = $request->q;
        if(isset($search)){
            if($request->has('q')){
                $data = DB::table('kriteria')->select('*')
                ->where('kode_kriteria','LIKE',"%$search%")
                ->get();
            }
        }else{
            $data = DB::table('kriteria')->get();
        }
        return response()->json($data);
    }
}
