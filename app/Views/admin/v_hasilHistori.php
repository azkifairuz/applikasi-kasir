<?php echo view('layout/header');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Histori</h1>
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

    <div class="row col">
      <div class="col-12">

        <div class="card">
          <div class="card-header row d-flex justify-content-between w-100">
            <h3 class="card-title col-10">Histori Barang Keluar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?php echo base_url('barangKeluar/exportToExcel') ?>" method="post">


              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>no faktur</th>
                    <th>nama produk</th>
                    <th>jumlah</th>
                    <th>harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    if (!$histori) {
                      ?>
                      <td colspan="5" align="center">Belum Ada Barang Di Keranjang</td>
                      <?php
                    }
                    $no = 1;
                    foreach ($histori as $row):
                      ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $row->no_faktur; ?>
                      </td>
                      <td>
                        <?php echo $row->nm_produk; ?>
                      </td>
                      <td>
                        <?php echo $row->jml_barang; ?>
                      </td>
                      <td>
                        <?php echo $row->harga_jual; ?>
                      </td>
                    </tr>

                    <?php $no++; endforeach; ?>

                  </tr>
                </tbody>
              </table>

              <button type="submit" name="submit" class="btn mt-2 col-2 btn-primary">Print</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

  </section>
</div>





<?php echo view('layout/footer'); ?>