<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternatifModels;
use App\Models\BobotAlternatifModels;
use App\Models\KriteriaModels;
use App\Models\BobotKriteriaModels;
use App\Models\CalculateAlternatifModels;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = AlternatifModels::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url("alternatiff/edit/".$row->id_alternatif) .'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn .= ' <button data-id="'.$row->id_alternatif.'" class="btn-hapus btn btn-danger btn-sm">Delete</button>';
                            return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make();
         }
         
        return view('alternatif.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // printJSON('a');
        return view('alternatif.add');
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

        $cekData = AlternatifModels::where('kode_alternatif', $request->kode_alternatif)->count();
        
        if($cekData == 0){
            try{

                
                $alternatif = AlternatifModels::create([
                    'nama_alternatif' => $request->nama_alternatif,
                    'kode_alternatif' => $request->kode_alternatif,
                    'keterangan_alternatif' => '',
                    'alamat' => $request->alamat,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'no_kk' => $request->no_kk,
                    'nik' => $request->nik,
                ]);

                $kriteria = KriteriaModels::all();
                foreach($kriteria as $k){
                    CalculateAlternatifModels::insert([
                        'kode_alternatif' => $request->kode_alternatif,
                        'kriteria'  => $k->kode_kriteria,
                        'nilai' => 1
                    ]);
                }
                
                DB::commit();
                toastr()->success('Alternatif berhasil ditambahkan');
                return redirect('alternatif/index');
            }catch(\Exception $e){
                DB::rollback();
                printJSON($e->getMessage());
                toastr()->success('Eror '. $e->getMessage());
                return redirect('alternatif/index');
            }
        }else{
            toastr()->info('Kode alternatif sudah ada');
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
        $data = AlternatifModels::where('id_alternatif', $id)->first();
        return view('alternatif.edit', compact('data'));
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
        $data = AlternatifModels::where('id_alternatif', $request->id_alternatif)->first();
        $cekData = AlternatifModels::where('kode_alternatif', $request->kode_alternatif)->where('id_alternatif','!=', $request->id_alternatif)->count();
        if($cekData == 0){
            try{
                $kriteria = AlternatifModels::where('id_alternatif', $request->id_alternatif)->update([
                    'nama_alternatif' => $request->nama_alternatif,
                    'kode_alternatif' => $request->kode_alternatif,
                    'keterangan_alternatif' => '',
                    'alamat' => $request->alamat,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'no_kk' => $request->no_kk,
                    'nik' => $request->nik,
                ]);

                CalculateAlternatifModels::where('kode_alternatif', $data->kode_alternatif)->update([
                    'kode_alternatif'   => $request->kode_alternatif
                ]);
                
                DB::commit();
                toastr()->success('Kriteria berhasil diperbarui');
                return redirect('alternatif/index');
            }catch(\Exception $e){
                DB::rollback();
                toastr()->success('Eror '. $e->getMessage());
                return redirect('alternatif/index');
            }
        }else{
            toastr()->info('Kode alternatif sudah ada');
            return redirect()->back();
        }
    }

    public function cetakPdf()
    {
        $data = AlternatifModels::all();
 
        $pdf = PDF::loadview('alternatif.kriteria_pdf',['data'=>$data]);
        return $pdf->stream();
    }
    public function cetakExcel()
    {
        $data = AlternatifModels::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells("A1:H1")->setCellValue('A1', 'Master Data Alternatif');
        $sheet->mergeCells("A2:H2")->setCellValue('A2', ' ');
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kode Alternatif');
        $sheet->setCellValue('C3', 'Nama Alternatif');
        // $sheet->setCellValue('D3', 'No KK');
        // $sheet->setCellValue('E3', 'NIK');
        // $sheet->setCellValue('F3', 'Alamat');
        // $sheet->setCellValue('G3', 'RT/RW');
         
        $i = 4;
        $no = 1;
        foreach($data as $p)
        {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $p->kode_alternatif);
            $sheet->setCellValue('C'.$i, ucfirst($p->nama_alternatif));
            // $sheet->setCellValue('D'.$i, $p->no_kk);
            // $sheet->setCellValue('E'.$i, $p->nik);
            // $sheet->setCellValue('F'.$i, $p->alamat);
            // $sheet->setCellValue('G'.$i, ($p->rt == null ? '000' : $p->rt) .'/'. ($p->rw == null ? '000' : $p->rw) );
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
        $endCeel = 'C';
        foreach (range('A', $endCeel) as $columnID) {
            $sheet->getColumnDimension($columnID)
            ->setAutoSize(true);
        }
        $sheet->getStyle('A3:C'.$i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=Master Data Alternatif.xlsx');
        $writer->save('php://output');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AlternatifModels::where('id_alternatif', $id)->first();
        CalculateAlternatifModels::where('kode_alternatif', $data->kode_alternatif)->delete();
        AlternatifModels::where('id_alternatif', $id)->delete();

        toastr()->success('Alternatif berhasil dihapus');
        return redirect('alternatif/index');

    }
    public function select2(Request $request)
    {
    	$data = [];
        $search = $request->q;
        if(isset($search)){
            if($request->has('q')){
                $data =DB::table('kriteria')->select('*')
                ->where('kode_kriteria','LIKE',"%$search%")
                ->get();
            }
        }else{
            $data = DB::table('kriteria')->get();
        }
        return response()->json($data);
    }

    public function import(Request $request){
        if (!empty($_FILES['file_excel']['name'])) {
            
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            // printJSON($allDataInSheet);
            
            $data = array();
            $kriteria = array();
            CalculateAlternatifModels::where('kode_alternatif','!=', null)->delete();
            AlternatifModels::where('kode_alternatif','!=', null)->delete();
            foreach ($allDataInSheet as $i => $row) {
                if ($i > 1) {
                    $alternatif = $row['A'];
                    $LT = $row['B'];
                    $KL = $row['C'];
                    $KD = $row['D'];
                    $SA = $row['E'];
                    $BB = $row['F'];
                    $JT = $row['G'];
                    $PH = $row['H'];
                    $TG = $row['I'];
                    $PJ = $row['J'];  
                    
                    AlternatifModels::insert([
                        'kode_alternatif'   => $alternatif,
                        'nama_alternatif'   => $alternatif,
                    ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'LT', 'nilai' => $LT ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'KL', 'nilai' => $KL ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'KD', 'nilai' => $KD ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'SA', 'nilai' => $SA ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'BB', 'nilai' => $BB ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'JT', 'nilai' => $JT ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'PH', 'nilai' => $PH ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'TG', 'nilai' => $TG ]);
                    CalculateAlternatifModels::insert(['kode_alternatif'=> $alternatif, 'kriteria'  => 'PJ', 'nilai' => $PJ ]);
                }
                
            }
           
            return redirect()->back();
        }
    }
}
