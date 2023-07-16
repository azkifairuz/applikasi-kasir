<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
   
    public function getDataId($table,$where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        return $builder->get()->getResult();
    }
    public function changePw($id,$newPw)
    {
        $query = $this->db->table('users')
        ->where('id_users', $id)
        ->update($newPw);
        return $query;

    }
}
