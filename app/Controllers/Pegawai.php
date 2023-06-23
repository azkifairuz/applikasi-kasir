<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPegawai;
class Pegawai extends BaseController
{
    private $pegawai = '' ;

    public function __construct()
    {
        $this->pegawai = new ModelPegawai;
    }
    public function index()
    {
        $pegawai = $this->pegawai->getPegawai();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Pegawai',
            'showData' => $pegawai,
        );
        return view("admin/v_pegawai", $data);
    }
    public function FormTambahPegawai()
    {

        $getCurrentId = $this->pegawai->getCurrentId();
        $data = array(
            'title' => 'Admin',
            'subtitle' => 'Produk',
            'currentId' => $getCurrentId,
        );
        return view("admin/v_addPegawai", $data);
    }
    public function save()
    {
        $data = array(
            'id_pegawai' => $this->request->getVar('idPegawai'),
            'nm_pegawai' => $this->request->getVar('nmPegawai'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('noTelp'),
            'jsn_kelamin' => $this->request->getVar('jk'),
            'tgl_lahir' => $this->request->getVar('tglLahir'),
            'tmp_lahir' => $this->request->getVar('tmpLahir'),
        );
        $akun = array(
            'id_users' => $this->request->getVar('idPegawai'),
            'id_pegawai' => $this->request->getVar('idPegawai'),
            'username' => $this->request->getVar('username'),
            'password' => 'cepatganti',
            'roles' => $this->request->getVar('roles'),
        );

        session()->setFlashdata('success', 'berhasil');
        $this->pegawai->tambahPegawai($data);
        $this->pegawai->daftarAkun($akun);
        return redirect()->to('pegawai');
    }
}
