<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{   
    private $modelKategori = "";
    public function __construct()
    {   
        $this->modelKategori = new ModelKategori;
    }

    public function index()
    {
        $kategori = $this->modelKategori->getDataKategori();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Kategori',
            'showData' => $kategori,
        );
        return view("admin/v_kategori", $data);
        
    }

    public function cekLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $where = [
            'username' => $username,
        ];
        $getDataId = $this->modelLogin->getDataId($this->table,$where);

        if($getDataId == null){
            session()->setFlashdata('message', 'Username atau Password tidak ditemukan');
            return redirect()->to('login');
        }
        foreach($getDataId as $data):    
            if(password_verify($password,$data->password)){
                $dataSession = [
                    
                    'sesid_user'    => $data->id_users,
                    'sesid_peg'    => $data->id_pegawai,
                    'username'    => $data->username,
                    'seslevel'      => $data->roles,
                    'logged_in'     => true,
                ];
                
                $this->session->set($dataSession);
                return redirect()->to('dasboard');
            }else{
                session()->setFlashdata('message', 'cek kembali Username atau Password anda');
                return redirect()->to('login');
            }
        endforeach;
    }

    public function logout()
    {
        $this->session->destroy();
        return view("v_login");
    }
}
