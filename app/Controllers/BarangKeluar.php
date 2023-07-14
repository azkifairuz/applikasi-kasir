<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangKeluar;
use App\Models\ModelProduk;

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

}