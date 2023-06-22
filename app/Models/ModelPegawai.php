<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
   public function getUser(){
    $query = $this->db->query("SELECT * from  `users` ");

    return $query->getResult();
   }

   
}
