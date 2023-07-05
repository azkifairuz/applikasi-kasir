<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupplier extends Model
{
    public function getDataSupplier(){
        $query = $this->db->query("SELECT * FROM supplier");
            return $query->getResult();
     }
     public function addSupplier($data)
    {
        $query = $this->db->table('supplier')
            ->insert($data);
        return $query;
    }

    public function updatesupplier($data,$id)
    {
        $query = $this->db->table('supplier')
        ->where('id_supplier',$id)
            ->update($data);
        return $query;
    }
    public function getDataSupplierbyid($id)
    {
        $query = $this->db->query("SELECT * FROM supplier WHERE id_supplier = '$id' ");
            return $query->getResult();
     }

     public function deleteSupplier($id)
    {
        $query = $this->db->query("DELETE * FROM `supplier` WHERE id_supplier = '$id' ");
            return $query;
    }
}
