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
        
        $data = array(
            'nm_kategori' => $this->request->getVar('nmKategori'),
            'keterangan' => $this->request->getVar('keterangan'),
        );
        session()->setFlashdata('success', 'berhasil');
        $this->modelKategori->addKategori($data);
        return redirect()->to('kategori');
    }

    public function updateKategori()
    {
        $idKategori = $this->request->getVar('idKategori');

        $data = array(
            'nm_kategori' => $this->request->getVar('nmKategori'),
            'keterangan' => $this->request->getVar('keterangan'),
        );

        session()->setFlashdata('success', 'berhasil');
        $this->modelKategori->updateKategori($data, $idKategori);
        return redirect()->to('kategori');
    }

    public function detailKategori($idKategori)
    {
        $kategori = $this->modelKategori->getDataKategoriById($idKategori);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategoris',
            'kategories' => $kategori,
        );
        return view("admin/v_detailKategori", $data);
    }

    public function deleteKategori()
    {
        $idKategori = $this->request->getVar('idKategori');
        $this->modelKategori->deleteKategori($idKategori);
        return redirect()->to('kategori');
    }

}
