<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function getDataKategori(){
        $query = $this->db->query("SELECT * FROM kat_produk");
            return $query->getResult();
     }
}
