<?php echo view('layout/header');
session();
$idUser = $_SESSION['sesid_user']

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ganti Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('satuan') ?>">Table satuan</a></li>
            <li class="breadcrumb-item active">Ganti Password</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('login/savePw/'. $idUser) ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="text" name="newPw" class="form-control">
                </div>
                <div class="form-group">
                  <label>Konfirmasi</label>
                  <input type="text" name="confirm" class="form-control">
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