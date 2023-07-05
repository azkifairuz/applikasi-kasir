<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangKeluar;
class BarangKeluar extends BaseController
{
    private $bk = '';
    public function __construct() {
        $this->bk = new ModelBarangKeluar;
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

    public function tambahBarangKeluar()
    {
        
        $data = array(
            'no_faktur' => $this->request->getVar('noFaktur'),
            'tgl_keluar' => $this->request->getVar('tglKeluar'),
            'jml_barang' => $this->request->getVar('jmlBarang'),
            'id_pegawai' => $this->request->getVar('idPegawai'),
            'id_produk' => $this->request->getVar('idProduk'),
            'harga_jual' => $this->request->getVar('hargaJual'),
        );
        session()->setFlashdata('success', 'berhasil');
        $this->ModelBarangKeluar->addDataBarangKeluar($data);
        return redirect()->to('barangkeluar');
    }

    public function detailBarangKeluar($idKategori)
    {
        $barangKeluar = $this->modelBarangKeluar->getBarangKeluarById($idKategori);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategoris',
            'kategories' => $barangKeluar,
        );
        return view("admin/v_detailKategori", $data);
    }
  
}