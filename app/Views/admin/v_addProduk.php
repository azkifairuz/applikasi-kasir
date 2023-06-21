<?php echo view('layout/header'); ?>
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
      <form name="tambahdata" method="POST" action="<?php echo base_url('user/tambahUser/') ?>">
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
                    <label>Nama Produk</label>
                    <input type="text" name="nmProduk" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>stok</label>
                    <input type="number" name="stok" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nmProduk" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nmProduk" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select name="satuan" id="" class="form-control">
                      <option value="2">kaprodi</option>
                      <option value="3">dekan</option>
                      <option value="4">wr1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>prodi</label>
                    <select name="kdProdi" id="" class="form-control">
                      <option value="">-=pilih prodi=-</option>
                      <?php
                      foreach ($kd_prodi as $key) {
                        echo '<option value="'.$key->kd_prodi.'">'.$key->nm_prodi.'</option>';
                      }
                      ?>


                    </select>
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
</div>





<?php echo view('layout/footer'); ?>