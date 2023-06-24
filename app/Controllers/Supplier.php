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
        return view('v_supplier',$data);
    }

   
}

