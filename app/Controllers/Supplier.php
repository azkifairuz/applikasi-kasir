<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSupplier;
class Supplier extends BaseController
{   
    private $supplier= "";
    public function __construct()
    {   
        $this->supplier = new ModelSupplier;
    }

    public function index()
    {
        $sup = $this->supplier->getDataSupplier();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Supplier',
            'showData' => $sup,
        );
        return view('admin/v_supplier',$data);
    }
    public function tambahSupplier()
    {
        $data = array(
            'nm_supplier' => $this->request->getVar('nm_supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('No_telp'),
            'email' => $this->request->getVar('email'),
        );
        session()->setFlashdata('success', 'berhasil');
        $this->supplier->addSupplier($data);
        return redirect()->to('supplier');
    }
    public function FormTambahSupplier()
    {
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'supplier',
        );
        return view("admin/v_addSupplier", $data);
    }

    public function detailsupplier($idsupplier)

    {
       $sup = $this->supplier->getDataSupplierbyid($idsupplier);
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Supplier',
            'suppliers' => $sup
        );
        return view("admin/v_detailsupplier", $data);
    }

    public function updateProduk()
    {
        $idProduk = $this->request->getVar('idProduk');

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
        $this->supplier->updatesupplier($data,$idProduk);
        return redirect()->to('supplier');
}

}