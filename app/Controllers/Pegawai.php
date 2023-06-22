<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        $produk = $this->produk->getDataProduk();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
            'showData' => $produk,
        );
        return view("admin/v_", $data);
    }
}
