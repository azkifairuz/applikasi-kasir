<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangKeluar;
use App\Models\ModelProduk;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BarangKeluar extends BaseController
{
    private $bk = '';
    private $prod = '';
    public function __construct()
    {
        $this->bk = new ModelBarangKeluar;
        $this->prod = new ModelProduk;
    }
    public function index()
    {

        $bKeluar = $this->bk->getDataBarangKeluar();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'barang',
            'showData' => $bKeluar,
        );
        return view("admin/v_barangKeluar", $data);
    }
    public function formTambahBk()
    {
        $produk = $this->prod->getDataProduk();
        $idProduk = $this->request->getVar('produk');
        $harga = $this->bk->getHargaBarangByid($idProduk);
        $keranjang = $this->bk->getDataBarangBelum();
        $data = array(
            'title' => 'Kasir',
            'subtitle' => 'Pemesanan',
            'harga' => $harga,
            'produks' => $produk,
            'keranjang' => $keranjang,
        );
        return view("admin/v_addBarangKeluar", $data);
    }
    public function tambahKeranjang()
    {
        session();
        $id = $this->request->getVar('idProduk');
        $harga = $this->bk->getHargaBarangByid($id);
        $lastFak = $this->bk->getStatus();
        $status = "";
        $noFaktur = 1;
        $newFaktur = '';
        $idPeg = $_SESSION['sesid_peg'];
        foreach ($harga as $item) {
            $harga_jual = $item->harga_jual;
        }
        foreach ($lastFak as $item1) {
            $noFaktur = $item1->no_faktur;
        }
        $datacobas = $this->bk->getStatus();

        foreach ($datacobas as $item2) {
            $status = $item2->status;
        }
        if ($status == null) {
            $newFaktur = 1;
        } elseif ($status == "belum") {
            $newFaktur = $noFaktur;
        } elseif ($status == "sudah") {
            $newFaktur = $noFaktur + 1;
        }
        // dd($status);

        $data = array(
            'no_faktur' => $newFaktur,
            'jml_barang' => $this->request->getVar('qty'),
            'id_produk' => $id,
            'harga_jual' => $harga_jual,
            'id_pegawai' => $idPeg
        );
        session()->setFlashdata('success', 'berhasil');
        $this->bk->addDataBarangKeluar($data);
        return redirect()->to('barangkeluar/formTambahBk');
    }
    public function updateStatus()
    {
        $id = $this->request->getVar('noFak');
        $this->bk->updateStatus($id);
        return redirect()->to('barangkeluar/formTambahBk');
    }


    public function detailBarangKeluar($idKategori)
    {
        $barangKeluar = $this->bk->getBarangKeluarById($idKategori);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategoris',
            'kategories' => $barangKeluar,
        );
        return view("admin/v_detailKategori", $data);
    }

    public function deleteBk($idBk)
    {
        $this->bk->deleteBk($idBk);
        return redirect()->to('barangKeluar');
    }
    public function historiBk()
    {

        $listTgl = $this->bk->listTanggal();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Piih Tanggal',
            'listTgl' => $listTgl,

        );
        return view("admin/v_historiBk", $data);


    }
    public function getHistoriBk()
    {
        $tglAwal = $this->request->getVar('tglAwal');
        $tglAkhir = $this->request->getVar('tglAkhir');
        session()->set("tglAwal", $tglAwal);
        session()->set("tglAkhir", $tglAkhir);
        $histori = $this->bk->getHIstori($tglAwal, $tglAkhir);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategoris',
            'histori' => $histori,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir
        );
        return view("admin/v_hasilHistori", $data);

    }

    public function exportToExcel()
    {
        session();
        $tglAwal = $_SESSION['tglAwal'];
        $tglAkhir = $_SESSION['tglAkhir'];
        $histori = $this->bk->getHIstori($tglAwal, $tglAkhir);

        // Menggunakan library PhpSpreadsheet


        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis header kolom
        $headerColumns = ['ID Stok Keluar', 'No. Faktur', 'Tanggal Keluar', 'Harga Jual', 'Nama Produk', 'Nama Pegawai', 'Jumlah Barang'];
        $columnIndex = 1;
        foreach ($headerColumns as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }

        // Menulis data histori ke dalam sheet
        $rowIndex = 2;
        foreach ($histori as $data) {
            $sheet->setCellValue('A' . $rowIndex, $data->id_stok_keluar);
            $sheet->setCellValue('B' . $rowIndex, $data->no_faktur);
            $sheet->setCellValue('C' . $rowIndex, $data->tgl_keluar);
            $sheet->setCellValue('D' . $rowIndex, $data->harga_jual);
            $sheet->setCellValue('E' . $rowIndex, $data->nm_produk);
            $sheet->setCellValue('F' . $rowIndex, $data->nm_pegawai);
            $sheet->setCellValue('G' . $rowIndex, $data->jml_barang);
            $rowIndex++;
        }

        // Menyimpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_histori.xlsx';
        $writer->save($filename);

        // Mengirimkan file Excel ke browser untuk diunduh
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($filename);
        unlink($filename);
    }

}