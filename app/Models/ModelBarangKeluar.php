<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangKeluar extends Model
{
    public function getDataBarangKeluar()
    {
        $query = $this->db->query("SELECT barang_keluar.id_stok_keluar, barang_keluar.no_faktur,barang_keluar.tgl_keluar,produk.harga_jual, produk.nm_produk, pegawai.nm_pegawai, barang_keluar.jml_barang FROM `barang_keluar` as barang_keluar INNER JOIN `produk` as produk ON barang_keluar.id_produk = produk.id_produk INNER JOIN `pegawai` AS pegawai ON barang_keluar.id_pegawai = pegawai.id_pegawai;  ");
        return $query->getResult();
    }
    public function getDataBarangBelum()
    {
        $query = $this->db->query("SELECT barang_keluar.id_stok_keluar, barang_keluar.no_faktur,barang_keluar.tgl_keluar,produk.harga_jual, produk.nm_produk,  barang_keluar.jml_barang FROM `barang_keluar` as barang_keluar INNER JOIN `produk` as produk ON barang_keluar.id_produk = produk.id_produk WHERE status = 'belum'");
        return $query->getResult();
    }
    public function getHargaBarangByid($id)
    {
        $query = $this->db->query("SELECT harga_jual FROM produk where id_produk ='$id' ");
        return $query->getResult();
    }
    public function getStatus()
    {
        $query = $this->db->query("SELECT status,no_faktur FROM barang_keluar ORDER by no_faktur DESC LIMIT 1");
        return $query->getResult();
    }
    public function updateStatus($id)
    {

        // $builder = $this->db->table('barang_keluar')->set('status','sudah')->where('no_faktur',$id);
        $builder = $this->db->query("UPDATE barang_keluar SET status='sudah' WHERE no_faktur = '$id' ");
        return $builder;
    }
    public function addDataBarangKeluar($data)
    {
        $query = $this->db->table('barang_keluar')
            ->insert($data);
        return $query;
    }

}