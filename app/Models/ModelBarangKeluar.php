<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangKeluar extends Model
{
    public function getDataBarangKeluar()
    {
        $query = $this->db->query("SELECT a.id_stok_masuk,peg.nm_pegawai,no_faktur,a.tgl_masuk,a.jml_barang,a.harga_beli,s.nm_supplier,p.nm_produk FROM `barang_masuk` as a 
        INNER JOIN produk as p ON a.id_produk = p.id_produk 
        INNER JOIN supplier as s on a.id_supplier = s.id_supplier
        INNER JOIN pegawai as peg on a.id_pegawai = peg.id_pegawai ");
        return $query->getResult();
    }
    public function addDataBarangMasuk($data)
    {
        $query = $this->db->table('barang_masuk')
            ->insert($data);
        return $query;
    }

}
