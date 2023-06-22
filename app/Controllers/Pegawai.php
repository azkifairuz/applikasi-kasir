<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPegawai;
class Pegawai extends BaseController
{
    private $pegawai = '' ;

    public function __construct()
    {
        $this->pegawai = new ModelPegawai;
    }
    public function index()
    {
        $pegawai = $this->pegawai->getPegawai();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Pegawai',
            'showData' => $pegawai,
        );
        return view("admin/v_pegawai", $data);
    }
}
