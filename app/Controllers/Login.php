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
        $getDataId = $this->modelLogin->getDataId($this->table, $where);

        if ($getDataId == null) {
            session()->setFlashdata('message', 'Username atau Password tidak ditemukan');
            return redirect()->to('login');
        }
        foreach ($getDataId as $data):
            if (password_verify($password, $data->password)) {
                $dataSession = [

                    'sesid_user' => $data->id_users,
                    'sesid_peg' => $data->id_pegawai,
                    'username' => $data->username,
                    'seslevel' => $data->roles,
                    'logged_in' => true,
                ];

                $this->session->set($dataSession);
                return redirect()->to('dasboard');
            } else {
                session()->setFlashdata('message', 'cek kembali Username atau Password anda');
                return redirect()->to('login');
            }
        endforeach;
    }
    public function gantiPassword($idUser)
    {
        $data = array(
            'title' => 'Edit',
            'subtitle' => 'user',
        );

        return view('admin/v_gantiPw', $data);
    }
    public function savePw($idUser)
    {
        $data = array(
            'password' => password_hash($this->request->getVar('newPw'), PASSWORD_DEFAULT),
        );
        $newPw = $this->request->getVar('newPw');
        $confirm = $this->request->getVar('confirm');
        if ($newPw == $confirm) {
            session()->setFlashdata('success', 'password berhasil diubah');
            $this->modelLogin->changePw($idUser, $data);
            return redirect()->to('dasboard');

        }
        session()->setFlashdata('message', 'gagal');
        return redirect()->to('login/gantiPassword/' . $idUser);
    }
    public function resetPw($idUser)
    {
        $data = array(
            'password' => password_hash("cepatganti", PASSWORD_DEFAULT),
        );

        session()->setFlashdata('success', 'password berhasil diubah');
        $this->modelLogin->changePw($idUser, $data);
        return redirect()->to('pegawai');

    }

    public function logout()
    {
        $this->session->destroy();
        return view("v_login");
    }
}