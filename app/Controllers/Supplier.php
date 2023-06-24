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
        $supplier = $this->supplier->getsupplier();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Pegawai',
            'showData' => $pegawai,
        );
        return view('v_supplier');
    }

   
}

