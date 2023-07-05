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

    public function tambahSatuan()
    {
        session();
        $data = array(
            'nm_Satuan' => $this->request->getVar('nmSatuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        
        );
        session()->setFlashdata('success', 'berhasil');
        $this->modelSatuan->addSatuan($data);
        return redirect()->to('satuan');
    }

    public function updateSatuan()
    {
        $idSatuan = $this->request->getVar('idSatuan');

        $data = array(
            'nm_satuan' => $this->request->getVar('nmSatuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        );

        session()->setFlashdata('success', 'berhasil');
        $this->modelSatuan->updateSatuan($data, $idSatuan);
        return redirect()->to('satuan');
    }

    public function detailSatuan($idSatuan)
    {
        $satuan = $this->modelSatuan->getDataSatuanById($idSatuan);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Satuans',
            'kategories' => $satuan,
        );
        return view("admin/v_detailSatuan", $data);
    }

    public function deleteSatuan($idSatuan)
    {
        $this->modelSatuan->deleteSatuan($idSatuan);
        return redirect()->to('satuan');
    }

}
