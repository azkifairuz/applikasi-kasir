<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangMasuk;
use App\Models\ModelKategori;
use App\Models\ModelProduk;
use App\Models\ModelSatuan;
use App\Models\ModelSupplier;
use CodeIgniter\I18n\Time;

class Produk extends BaseController
{
    private $produk = "";
    private $kategori = "";
    private $supplier = "";
    private $satuan = "";
    private $bm = "";
    public function __construct()
    {
        $this->produk = new ModelProduk;
        $this->satuan = new ModelSatuan;
        $this->kategori = new ModelKategori;
        $this->supplier = new ModelSupplier;
        $this->bm = new ModelBarangMasuk;
    }
    public function index()
    {
        $produk = $this->produk->getDataProduk();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
            'showData' => $produk,
        );
        return view("admin/v_produk", $data);
    }
    public function ViewTambahProduk()
    {
        $satuan = $this->satuan->getDataSatuan();
        $kategori = $this->kategori->getDataKategori();
        $supplier = $this->supplier->getDataSupplier();
        $getCurrentId = $this->produk->getCurrentId();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
            'kategories' => $kategori,
            'satuans' => $satuan,
            'suppliers' => $supplier,
            'currentId' => $getCurrentId,
        );
        return view("admin/v_addProduk", $data);
    }

    public function detailProduk($idProduk)
    {
        $satuan = $this->satuan->getDataSatuan();
        $kategori = $this->kategori->getDataKategori();
        $supplier = $this->supplier->getDataSupplier();
        $getCurrentId = $this->produk->getCurrentId();
        $currentProduk = $this->produk->getDataProdukById($idProduk);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
            'kategories' => $kategori,
            'satuans' => $satuan,
            'suppliers' => $supplier,
            'currentId' => $getCurrentId,
            'produks' => $currentProduk,
        );
        return view("admin/v_detailProduk", $data);
    }

    public function tambahProduk()
    {
        session();
        $idPeg = $_SESSION['sesid_peg'];
        $nowDate = Time::now();
        ;
        $currentDate = $nowDate->toDateString();
        $randomNumber = (time() % 90000) + 10000;
        $data = array(
            'id_produk' => $this->request->getVar('idProduk'),
            'nm_produk' => $this->request->getVar('nmProduk'),
            'id_supplier' => $this->request->getVar('supplier'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stok' => $this->request->getVar('stok'),
            'id_satuan' => $this->request->getVar('satuan'),
            'id_kategori' => $this->request->getVar('kategori'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
        );
        $bm = array(
            'no_faktur' => $randomNumber,
            'id_supplier' => $this->request->getVar('supplier'),
            'id_produk' => $this->request->getVar('idProduk'),
            'tgl_masuk' => $currentDate,
            'jml_barang' => $this->request->getVar('stok'),
            'id_pegawai' => $idPeg,
            'harga_beli' => $this->request->getVar('harga_beli'),
        );

        session()->setFlashdata('success', 'berhasil');
        $this->produk->addProduk($data);
        $this->bm->addDataBarangMasuk($bm);
        return redirect()->to('produk');
    }

    public function updateProduk()
    {
        $idProduk = $this->request->getVar('idProduk');

        $data = array(
            'nm_produk' => $this->request->getVar('nmProduk'),
            'id_supplier' => $this->request->getVar('supplier'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stok' => $this->request->getVar('stok'),
            'id_satuan' => $this->request->getVar('satuan'),
            'id_kategori' => $this->request->getVar('kategori'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
        );

        session()->setFlashdata('success', 'berhasil');
        $this->produk->updateProduk($data, $idProduk);
        return redirect()->to('produk');
    }
}