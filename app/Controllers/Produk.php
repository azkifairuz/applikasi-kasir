<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelProduk;
use App\Models\ModelSatuan;
use App\Models\ModelSupplier;
use App\Models\satuan;
use App\Models\kategori;
use App\Models\supplier;

class Produk extends BaseController
{
    private $produk = "";
    private $kategori = "";
    private $supplier = "";
    private $satuan = "";
    public function __construct()
    {
        $this->produk = new ModelProduk;
        $this->satuan = new ModelSatuan;
        $this->kategori = new ModelKategori;
        $this->supplier = new ModelSupplier;
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

    public function tambahProduk()
    {
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
        $this->produk->addProduk($data);
        return redirect()->to('produk');
    }

}