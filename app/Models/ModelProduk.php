<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
 public function getDataProduk() {
    $query = $this->db->query("SELECT * FROM produk");
    return $query->getResult();
 }

 public function getDataProdukById($idProduk) {
    $query = $this->db->query("SELECT * FROM produk where id_produk = '$idProduk'");
    return $query->getResult();
 }
}
