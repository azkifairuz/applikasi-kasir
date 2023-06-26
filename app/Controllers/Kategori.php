<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{   
    private $modelKategori = "";
    public function __construct()
    {   
        $this->modelKategori = new ModelKategori;
    }

    public function index()
    {
        $kategori = $this->modelKategori->getDataKategori();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategori',
            'showData' => $kategori,
        );
        return view("admin/v_kategori", $data);
        
    }

    public function FormTambahKategori()
    {
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
        );
        return view("admin/v_TambahKategori", $data);
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

        session()->setFlashdata('success', 'berhasil');
        $this->produk->addProduk($data);
        return redirect()->to('produk');
    }
}
