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

    public function updateSupplier()
    {
<<<<<<< HEAD
        $idsupplier = $this->request->getVar('idsupplier');

        $data = array(
            'nm_supplier' => $this->request->getVar('nama supplier'),
            'id_supplier' => $this->request->getVar('id supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no telp'),
            'email' => $this->request->getVar('email'),
=======
        $idProduk = $this->request->getVar('idSupplier');

        $data = array(
            'nm_supplier' => $this->request->getVar('nmSupplier'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('noTelp'),
            'email' => $this->request->getVar('email'),

>>>>>>> 1fd2cf1b00debe42b06ef88c342e6b08258bb34c
        );
        session()->setFlashdata('success', 'berhasil');
        $this->supplier->updatesupplier($data,$idProduk);
        return redirect()->to('supplier');
}

}