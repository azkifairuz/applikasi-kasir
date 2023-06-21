<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    public function getDataProduk()
    {
        $query = $this->db->query("SELECT a.id_produk, a.`nm_produk`,a.`stok`,a.`deskripsi`,a.`harga_beli`,a.`harga_jual`,b.nm_supplier,c.nm_satuan FROM `produk` a INNER JOIN supplier b ON a.`id_supplier`= b.id_supplier INNER JOIN satuan c ON a.`id_satuan` = c.id_satuan INNER JOIN kat_produk d ON a.`id_kategori` = d.id_kategori ");
        return $query->getResult();
    }

    public function getDataProdukById($idProduk)
    {
        $query = $this->db->query("SELECT a.id_produk ,a.`nm_produk`,a.`stok`,a.`deskripsi`,a.`harga_beli`,a.`harga_jual`,b.nm_supplier,c.nm_satuan FROM `produk` a INNER JOIN supplier b ON a.`id_supplier`= b.id_supplier INNER JOIN satuan c ON a.`id_satuan` = c.id_satuan INNER JOIN kat_produk d ON a.`id_kategori` = d.id_kategori where a.id_produk = '$idProduk'");
        return $query->getResult();
    }

    public function addProduk()
    {
        $query = $this->db->table('produk')
            ->insert();
        return $query;
    }
}