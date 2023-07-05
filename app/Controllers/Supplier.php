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
        $idProduk = $this->request->getVar('idSupplier');

        $data = array(
            'nm_supplier' => $this->request->getVar('nmSupplier'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('noTelp'),
            'email' => $this->request->getVar('email'),

        );
        session()->setFlashdata('success', 'berhasil');
        $this->supplier->updatesupplier($data,$idSupplier);
        return redirect()->to('supplier');
}
public function deleteSupplier($idSupplier)
    {
        $this->modelSupplier->deleteSupplier($idSupplier);
        return redirect()->to('Supplier');
    }

}