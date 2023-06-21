<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
 public function getDataSatuan(){
    $query = $this->db->query("SELECT * FROM satuan");
        return $query->getResult();
 }
}
