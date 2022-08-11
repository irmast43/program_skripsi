<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModels;
use Illuminate\Http\Request;
use App\Models\BobotKriteriaModels;
use App\Models\KriteriaModels;
use App\Models\BobotAlternatifModels;
use App\Models\CalculateAlternatifModels;
use App\Models\CalculateModels;
use App\Models\TotalKriteria;
use Ramsey\Collection\Collection;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        //kriteria 
        $masterKriteria = KriteriaModels::orderby('created_at','asc')->get();
        $masterBobotKriteria = CalculateModels::all();

        $maapingBobotKriteria = array();
        $maapingGroupTotalKriteria = array();
        $maapingGroupJumlahKriteria = array();
        foreach($masterBobotKriteria as $k){
            $maapingBobotKriteria[$k->kode][$k->parrent][] = $k->nilai;
            $maapingGroupTotalKriteria[$k->parrent][] = $k->nilai;
            $maapingGroupJumlahKriteria[$k->kode][] = $k->nilai;
        }
       
        //alternatif
        $masterAlternatif = AlternatifModels::all();
        $masterBobotAlternatif =  CalculateAlternatifModels::all();
        $maapingBobotAlternatif = array();
        foreach($masterBobotAlternatif as $k){
            $maapingBobotAlternatif[$k->kode_alternatif][$k->kriteria][] = $k->nilai;
        }
        return view('perhitungan.index', compact('masterAlternatif','maapingBobotAlternatif','maapingGroupJumlahKriteria','maapingGroupTotalKriteria','maapingBobotKriteria','masterKriteria'));
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

    public function cetakRangkingPdf(Request $request){
        $data = at($request->data_rangking);
        $pdf = PDF::loadview('perhitungan.rangking',['data'=>$data]);
        return $pdf->stream();
    }

    public function cetakRangkingExcel(Request $request){
        $data =  $data = at($request->data_rangking);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Alternatif');
        $sheet->setCellValue('C1', 'Prefensi');
        $sheet->setCellValue('D1', 'Rangking');
         
        $i = 2;
        $no = 1;
        foreach($data as $p)
        {
            $p = at($p);
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $p->kode_alternatif);
            $sheet->setCellValue('C'.$i, $p->prefensi);
            $sheet->setCellValue('D'.$i, $p->rangking);
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
        header('Content-Disposition: attachment;filename=RANGKING.xlsx');
        $writer->save('php://output');
    }
}
