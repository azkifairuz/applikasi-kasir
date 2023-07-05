<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangKeluar extends Model
{
    public function getDataBarangKeluar()
    {
        $query = $this->db->query("SELECT a.id_stok_keluar,no_faktur,tgl_keluar,jml_barang,peg.id_pegawai,p.id_produk,harga_jual FROM `barang_keluar` as a 
        INNER JOIN produk as p ON a.id_produk = p.id_produk 
        INNER JOIN pegawai as peg on a.id_pegawai = peg.id_pegawai ");
        return $query->getResult();
    }
    public function addDataBarangKeluar($data)
    {
        $query = $this->db->table('barang_keluar')
            ->insert($data);
        return $query;
    }

}
