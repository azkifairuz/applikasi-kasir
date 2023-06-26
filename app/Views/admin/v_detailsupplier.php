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
 <?php foreach ($suppliers as $supplier ) {
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
                  <input type="hidden" required readonly value='<?php echo $supplier->id_supplier ?>' name="idSupplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama supplier</label>
                  <input type="text" value="<?php echo $supplier->nm_supplier ?>" name="nmSupplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>alamat</label>
                  <textarea type="text" value="<?php echo $supplier->alamat ?>" name="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Nomor Telpon</label>
                  <input type="text" value="<?php echo $supplier->no_telp ?>" name="noTelp" class="form-control">
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="text" value="<?php echo $supplier->email ?>" name="email" class="form-control">
                </div>
                
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