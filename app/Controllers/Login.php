<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{   
    private $session = "";
    private $modelLogin = "";
    protected $table = "users";
    public function __construct()
    {   
        $this->session = \Config\Services::session();
        $this->modelLogin = new ModelLogin;
    }

    public function index()
    {
        return view('V_login');
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
