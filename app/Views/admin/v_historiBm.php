<?php echo view('layout/header');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Histori Barang Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('barangKeluar') ?>">Table Produk</a></li>
            <li class="breadcrumb-item active">Histori</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content row">
    <form name="tambahdata" class="col" method="POST" action="<?php echo base_url('barangKeluar/getHistoriBk/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rentang Tanggal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Awal</label>
                  <select name="tglAwal" id="" class="form-control">
                    <option value="">-=pilih produk=-</option>
                    <?php
                    foreach ($listTgl as $item) {
                      
                      echo '<option value="' . $item->tgl_keluar. '">' . $item->tgl_keluar. '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Akhir</label>
                  <select name="tglAkhir" id="" class="form-control">
                    <option value="">-=pilih produk=-</option>
                    <?php
                    foreach ($listTgl as $item) {
                      echo '<option value="' . $item->tgl_keluar . '">' . $item->tgl_keluar. '</option>';
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
</div>





<?php echo view('layout/footer'); ?>