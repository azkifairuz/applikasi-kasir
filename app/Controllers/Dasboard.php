<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dasboard extends BaseController
{
    public function index()
    {
        $session = session();
        $cekSession = $session->get('logged_in');

        if($cekSession == false){
            return redirect()->to('login');
        }else{
            $data = [
                'title' => 'Kasir',
                'subtitle' => 'Dasboard',
            ];           
            return view('v_dasboard',$data);
        }        
    }
}