<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupplier extends Model
{
    public function getDataSatuan(){
        $query = $this->db->query("SELECT * FROM supplier");
            return $query->getResult();
     }
}
