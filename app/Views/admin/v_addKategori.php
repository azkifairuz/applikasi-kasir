<?php echo view('layout/header');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah pegawai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('kategori') ?>">Table pegawai</a></li>
            <li class="breadcrumb-item active">Tambah kategori</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('Kategori/tambahKategori') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nmKategori" class="form-control">
                </div>
                <div class="form-group">
                  <label>Keteramgan</label>
                  <input type="text" name="Keterangan" class="form-control">
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