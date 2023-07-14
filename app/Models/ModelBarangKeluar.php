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
        $tanggalKeluar = date("Y-m-d");
        $builder = $this->db->query("UPDATE barang_keluar SET status='sudah',  tgl_keluar='$tanggalKeluar' WHERE no_faktur = '$id' ");
        return $builder;
    }
    public function getHIstori($tglPertama,$tglKedua)
    {
        $builder = $this->db->query("SELECT barang_keluar.id_stok_keluar, barang_keluar.no_faktur,barang_keluar.tgl_keluar,produk.harga_jual, produk.nm_produk, pegawai.nm_pegawai, barang_keluar.jml_barang FROM `barang_keluar` as barang_keluar INNER JOIN `produk` as produk ON barang_keluar.id_produk = produk.id_produk INNER JOIN `pegawai` AS pegawai ON barang_keluar.id_pegawai = pegawai.id_pegawai WHERE tgl_keluar BETWEEN '$tglPertama' AND '$tglKedua' ");
        return $builder->getResult();
    }
    public function listTanggal()
    {
        $builder = $this->db->query("SELECT tgl_keluar FROM `barang_keluar` ");
        return $builder->getResult();
    }

    public function addDataBarangKeluar($data)
    {
        $query = $this->db->table('barang_keluar')
            ->insert($data);
        return $query;
    }
    public function deleteBk($idBk)
    {
        $query = $this->db->table('barang_keluar')->where('id_stok_keluar',$idBk)->delete();
            return $query;
    }
}