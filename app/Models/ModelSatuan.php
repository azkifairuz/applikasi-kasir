<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
 public function getDataSatuan(){
    $query = $this->db->query("SELECT * FROM satuan");
        return $query->getResult();
 }

 public function getDataSatuanById($KataAzkiAnjing){
    $query = $this->db->query("SELECT * FROM `satuan` WHERE id_satuan = '$KataAzkiAnjing' ");
        return $query->getResult();
 }

 public function addSatuan($data)
    {
        $query = $this->db->table('satuan')
            ->insert($data);
        return $query;
    }

    public function addSatuan($data)
    {
        $query = $this->db->table('satuan')
            ->insert($data);
        return $query;
    }

    public function updateSatuan($data,$id)
    {
        $query = $this->db->table('satuan')
        ->where('id_satuan',$id)
            ->update($data);
        return $query;
    }

    public function deleteSatuan($idsatuan)
    {
        $query = $this->db->query("DELETE FROM `satuan` WHERE `id_satuan` = '$idsatuan' ");
            return $query;
    }
}
