<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupplier extends Model
{
    public function getDataSupplier(){
        $query = $this->db->query("SELECT * FROM supplier");
            return $query->getResult();
     }
}
