<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function getDataKategori(){
        $query = $this->db->query("SELECT * FROM kat_produk");
            return $query->getResult();
     }

    public function getDataKategoriById($KataAzkiAnjing){
        $query = $this->db->query("SELECT * FROM `kat_produk` WHERE id_kategori = '$KataAzkiAnjing' ");
            return $query->getResult();
     }

     public function addKategori($data)
    {
        $query = $this->db->table('kat_produk')
            ->insert($data);
        return $query;
    }

    public function updateKategori($data,$id)
    {
        $query = $this->db->table('kat_produk')
        ->where('id_kategori',$id)
            ->update($data);
        return $query;
    }

    public function deleteKategori($idkategori)
    {
        $query = $this->db->query("DELETE FROM `kat_produk` WHERE 'id_kategori' = '$idkategori' ");
            return $query;
    }
}
