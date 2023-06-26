<?php echo view('layout/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('kategori') ?>">Table Kategori</a></li>
            <li class="breadcrumb-item active">T</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
 <?php foreach ($kategories as $kategori ) {
  ?>
   <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('kategori/updateKategori/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>nama kategori</label>
                  <input type="hidden" required readonly value='<?php echo $kategori->id_kategori ?>' name="idKategori" class="form-control">
                </div>
              <div class="card-body">
                <div class="form-group">
                  <label>nama kategori</label>
                  <input type="text" required value='<?php echo $kategori->nm_kategori ?>' name="nmKategori" class="form-control">
                </div>
                <div class="form-group">
                  <label>keterangan</label>
                  <input type="text" value="<?php echo $kategori->keterangan ?>" name="keterangan" class="form-control">
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