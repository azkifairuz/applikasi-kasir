<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangMasuk;
class BarangMasuk extends BaseController
{
    private $bm = '';
    public function __construct() {
        $this->bm = new ModelBarangMasuk;
    }
    public function index()
    {

        $bMasuk = $this->bm->getDataBarangMasuk();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'barang',
            'showData' => $bMasuk,
        );
        return view("admin/v_barangMasuk", $data);
    }
  
}