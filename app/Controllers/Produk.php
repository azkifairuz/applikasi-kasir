<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    public function index()
    {
        return view("admin/v_produk");
    }
}
