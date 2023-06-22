<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    public function getPegawai()
    {
        $query = $this->db->query("SELECT * from  `pegawai` ");

        return $query->getResult();
    }
    public function getPegawaiById($id)
    {
        $query = $this->db->query("SELECT * from  `pegawai` where id_pegawai = '$id' ");

        return $query->getResult();
    }


}