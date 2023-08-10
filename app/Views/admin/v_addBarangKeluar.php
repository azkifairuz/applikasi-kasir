<?php echo view('layout/header');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    <?php
      if (session()->get('failed')) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>
            <?php echo session()->getFlashdata('failed'); ?>
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
      }
      ?>
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pemesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('barangKeluar') ?>">Table Produk</a></li>
            <li class="breadcrumb-item active">Pemesanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content row">
    <form name="tambahdata" class="col" method="POST" action="<?php echo base_url('barangKeluar/tambahKeranjang/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pemesanan Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">

                <div class="form-group">
                  <label>Nama Produk</label>
                  <select name="idProduk" id="" class="form-control">
                    <option value="">-=pilih produk=-</option>
                    <?php
                    foreach ($produks as $produk) {
                      if ($produk->stok) {
                        echo '<option value="' . $produk->id_produk . '">' . $produk->nm_produk . '- Rp.' . number_format($produk->harga_jual) . '</option>';                        
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>jumlah</label>
                  <input type="number" name="qty" class="form-control">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.card -->

            </div>
          </div>

    </form>
    <div class="row col">
      <div class="col-12">

        <div class="card">
          <div class="card-header row d-flex justify-content-between w-100">
            <h3 class="card-title col-10">Keranjang</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?php echo base_url('barangKeluar/updateStatus') ?>" method="post">
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
                    if (count($keranjang) == null) {
                      ?>
                      <td colspan="5" align="center">Belum Ada Barang Di Keranjang</td>
                      <?php
                    }
                    $no = 1;
                    foreach ($keranjang as $row):
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
                    <input type="hidden" name="noFak" value="<?php
                    if ($row->no_faktur == 0) {
                      echo "";
                    } else {
                      echo $row->no_faktur;
                    } ?>">
                  
                    <?php $no++; endforeach; ?>
                  </tr>
                </tbody>
              </table>
              <button type="submit" name="submit" class="btn mt-2 col-2 btn-primary">Submit</button>
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