<?php echo view('layout/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Barang Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Barang</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php
      if (session()->get('success')) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>
            <?php echo session()->getFlashdata('success'); ?>
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
      }
      ?>
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header row d-flex justify-content-between w-100">
              <h3 class="card-title col-10">Barang Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>no faktur</th>
                    <th>supplier</th>
                    <th>nama produk</th>
                    <th>tanggal masuk</th>
                    <th>jumlah barang masuk</th>
                    <th>pegawai penerima barang</th>
                    <th>harga beli</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (count($showData) == null) {
                    ?>
                    <td collspa="9"></td>
                    <?php
                  }
                  $no = 1;
                  foreach ($showData as $row):
                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $row->no_faktur; ?>
                      </td>
                      <td>
                        <?php echo $row->nm_supplier; ?>
                      </td>
                      <td>
                        <?php echo $row->nm_produk; ?>
                      </td>
                      <td>
                        <?php echo $row->tgl_masuk; ?>
                      </td>
                      <td>
                        <?php echo $row->jml_barang; ?>
                      </td>
                      <td>
                        <?php echo $row->nm_pegawai; ?>
                      </td>
                      <td>
                        <?php echo $row->harga_beli; ?>
                      </td>

                     
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php echo view('layout/footer'); ?>