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
        return view("admin/v_addProduk", $data);
    }
}

