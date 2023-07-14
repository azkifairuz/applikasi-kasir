<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangMasuk;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class BarangMasuk extends BaseController
{
    private $bm = '';
    public function __construct() {
        $this->bm = new ModelBarangMasuk;
    }
    public function index()
    {

        $bMasuk = $this->bm->getDataBarangMasuk();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'barang',
            'showData' => $bMasuk,
        );
        return view("admin/v_barangMasuk", $data);
    }

    public function historiBm()
    {

        $listTgl = $this->bm->listTanggal();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Piih Tanggal',
            'listTgl' => $listTgl,

        );
        return view("admin/v_historiBm", $data);


    }
    public function getHistoriBm()
    {
        $tglAwal = $this->request->getVar('tglAwal');
        $tglAkhir = $this->request->getVar('tglAkhir');
        session()->set("tglAwal", $tglAwal);
        session()->set("tglAkhir", $tglAkhir);
        $histori = $this->bm->getHistoriBm($tglAwal, $tglAkhir);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'histori barang masuk',
            'histori' => $histori,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir
        );
        return view("admin/v_hasilHistoriBm", $data);

    }

    public function exportToExcel()
    {
        session();
        $tglAwal = $_SESSION['tglAwal'];
        $tglAkhir = $_SESSION['tglAkhir'];
        $histori = $this->bm->getHistoriBm($tglAwal, $tglAkhir);

        // Menggunakan library PhpSpreadsheet


        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis header kolom
        $headerColumns = ['ID Stok Masuk', 'Nama Pegawai', 'No. Faktur', 'Tanggal Masuk', 'Jumlah Barang', 'Harga Beli', 'Nama Supplier', 'Nama Produk'];
        $columnIndex = 1;
        foreach ($headerColumns as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }
    
        // Menulis data histori barang masuk ke dalam sheet
        $rowIndex = 2;
        foreach ($histori as $data) {
            $sheet->setCellValue('A' . $rowIndex, $data->id_stok_masuk);
            $sheet->setCellValue('B' . $rowIndex, $data->nm_pegawai);
            $sheet->setCellValue('C' . $rowIndex, $data->no_faktur);
            $sheet->setCellValue('D' . $rowIndex, $data->tgl_masuk);
            $sheet->setCellValue('E' . $rowIndex, $data->jml_barang);
            $sheet->setCellValue('F' . $rowIndex, $data->harga_beli);
            $sheet->setCellValue('G' . $rowIndex, $data->nm_supplier);
            $sheet->setCellValue('H' . $rowIndex, $data->nm_produk);
            $rowIndex++;
        }
    
        // Menyimpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_histori_bm.xlsx';
        $writer->save($filename);

        // Mengirimkan file Excel ke browser untuk diunduh
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($filename);
        unlink($filename);
    }
  
}