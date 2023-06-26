<?php echo view('layout/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Supplier</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('supplier') ?>">Table supplier</a></li>
            <li class="breadcrumb-item active">Tambah supplier</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
 <?php foreach ($produks as $produk ) {
  ?>
   <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('supplier/updateSupplier/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>id supplier</label>
                  <input type="text" required readonly value='<?php echo $produk->id_supplier ?>' name="idsupplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama supplier</label>
                  <input type="text" value="<?php echo $produk->nm_supplier ?>" name="nmsupplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>alamat</label>
                  <input type="number" value="<?php echo $produk->alamat ?>" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                  <label>No telp</label>
                  <select name="No telp" id="" class="form-control">
                    <option value="<?php echo $produk->no_telp ?>">no telp saat ini = <?php echo $produk->no_telp ?></option>
                    <?php
                    foreach ($satuans as $satuan) {
                      if ($satuan->id_supplier != $produk->id_satuan) {
                      echo '<option value="' . $satuan->id_satuan . '">' . $satuan->nm_satuan . '</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>email</label>
                  <select name="email" id="" class="form-control">
                    <option value="<?php echo $produk->id_kategori ?>">email saat ini = <?php echo $produk->email ?></option>
                    <?php
                    foreach ($kategories as $kategori) {
                      if ($kategori->id_kategori != $produk->id_kategori) {
                        echo '<option value="' . $kategori->id_kategori . '">' . $kategori->nm_kategori . '</option>';
                        
                      }
                    }
                    ?>
                  </select>
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
  
  <?php
 } ?>
</div>





<?php echo view('layout/footer'); ?>