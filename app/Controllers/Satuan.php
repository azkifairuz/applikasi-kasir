<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSatuan;

class Satuan extends BaseController
{   
    private $modelSatuan = "";
    public function __construct()
    {   
        $this->modelSatuan = new ModelSatuan;
    }

    public function index()
    {
        $satuan = $this->modelSatuan->getDataSatuan();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Satuan',
            'showData' => $satuan,
        );
        return view("admin/v_satuan", $data);
        
    }

    public function FormTambahSatuan()
    {
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Satuan',
        );
        return view("admin/v_addSatuan", $data);
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
