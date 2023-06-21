<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
class Produk extends BaseController
{
    private $produk = "";
    public function __construct()
    {
        $this->produk = new ModelProduk;
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
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
        );
        return view("admin/v_produk",$data);
    }
}
