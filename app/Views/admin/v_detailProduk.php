<?php echo view('layout/header');

foreach ($currentId as $row) {   
    $jumlahprodukSaatini = $row->jml;
    $idPro = $jumlahprodukSaatini + 1;
    if($idPro < 10){
        $idProbaru = "0".$idPro;
    }else{
        $idProbaru = $idPro;
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('produk') ?>">Table Produk</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('produk/tambahProduk/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>id produk</label>
                  <input type="text" required value='<?php echo "PRO-$idProbaru" ?>' name="idProduk" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nmProduk" class="form-control">
                </div>
                <div class="form-group">
                  <label>stok</label>
                  <input type="number" name="stok" class="form-control">
                </div>
                <div class="form-group">
                  <label>satuan</label>
                  <select name="satuan" id="" class="form-control">
                    <option value="">-=pilih satuan=-</option>
                    <?php
                    foreach ($satuans as $satuan) {
                      echo '<option value="' . $satuan->id_satuan . '">' . $satuan->nm_satuan . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>kategori</label>
                  <select name="kategori" id="" class="form-control">
                    <option value="">-=pilih kategori=-</option>
                    <?php
                    foreach ($kategories as $kategori) {
                      echo '<option value="' . $kategori->id_kategori . '">' . $kategori->nm_kategori . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea type="text" name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>supplier</label>
                  <select name="supplier" id="" class="form-control">
                    <option value="">-=pilih supplier=-</option>
                    <?php
                    foreach ($suppliers as $supplier) {
                      echo '<option value="' . $supplier->id_supplier . '">' . $supplier->nm_supplier . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>harga_beli</label>
                  <input type="number" name="harga_beli" class="form-control">
                </div>
                <div class="form-group">
                  <label>harga_jual</label>
                  <input type="number" name="harga_jual" class="form-control">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.card -->

            </div>
          </div>

    </form>
  </section>
</div>





<?php echo view('layout/footer'); ?>