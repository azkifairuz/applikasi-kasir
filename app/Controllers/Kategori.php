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
        return view("admin/v_addKategori", $data);
    }

    public function tambahKategori()
    {
        session();
        $data = array(
            'nm_Kategori' => $this->request->getVar('nmKategori'),
            'keterangan' => $this->request->getVar('keterangan'),
        
        );
        session()->setFlashdata('success', 'berhasil');
        $this->modelKategori->addKategori($data);
        return redirect()->to('kategori');
    }
}
