<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    public function getPegawai()
    {
        $query = $this->db->query("SELECT a.id_users,a.id_pegawai,a.roles,b.nm_pegawai,b.email,b.no_telp,b.jsn_kelamin,b.tgl_lahir,b.tmp_lahir FROM `users` AS a INNER JOIN pegawai AS b ON b.id_pegawai = a.id_pegawai");

        return $query->getResult();
    }
    public function getPegawaiById($id)
    {
        $query = $this->db->query("SELECT * from  `pegawai` where id_pegawai = '$id' ");

        return $query->getResult();
    }
    public function tambahPegawai($data)
    {
        $query = $this->db->table('pegawai')
            ->insert($data);
        return $query;
    }
    public function naikPangkat($data, $id)
    {
        $query = $this->db->table('users')
            ->where('id_users', $id)
            ->update($data);
        return $query;
    }


    public function changePassword($idUser, $data)
    {
        $query = $this->db->table('users')
            ->where('id_user', $idUser)
            ->update($data);

        return $query;
    }

    


}