<?php echo view('layout/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data produk</li>
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
            <div class="card-header d-flex justify-content-between w-100">
              <h3 class="card-title">data produk</h3>
              <a href="produk/ViewTambahProduk" class="btn btn-primary">Tambah Produk</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>nama produk</th>
                    <th>supplier</th>
                    <th>deskripsi</th>
                    <th>stok</th>
                    <th>satuan</th>
                    <th>kategori</th>
                    <th>harga beli</th>
                    <th>harga jual</th>
                    <th class="text-center">aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($showData as $row):
                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $row->username; ?>
                      </td>
                      <td>
                        <?php echo $row->level; ?>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-success px-4 p-2"
                          href="<?php echo base_url('user/resetPw/' . $row->id_user . '/' . $row->username); ?>">
                          Reset Password
                        </a>
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