<?php echo view('layout/header');

foreach ($currentId as $row) {   
    $jumlahprodukSaatini = $row->jml;
    $idPro = $jumlahprodukSaatini + 1;
    if($idPro < 10){
        $idProbaru = "0".$idPro;
    }else{
        $idProbaru = $idPro;
    }
}
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
            <li class="breadcrumb-item"><a href="<?php echo base_url('pegawai') ?>">Table pegawai</a></li>
            <li class="breadcrumb-item active">Tambah pegawai</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <form name="tambahdata" method="POST" action="<?php echo base_url('pegawai/tambahPegawai/') ?>">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label>id Pegawai</label>
                  <input type="text" required readonly value='<?php echo "PEG-$idProbaru" ?>' name="idPegawai" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Pegawai</label>
                  <input type="text" name="nmPegawai" class="form-control">
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="number" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>nomor telpon</label>
                  <input type="number" name="noTelp" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" id="" class="form-control">
                    <option value="">-=Pilih Jenis Kelamin=-</option>
                    <option value="p">Perempuan</option>
                    <option value="l">Laki-Laki</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>tanggal lahir</label>
                  <input type="date" name="tglLahir" class="form-control">
                </div>
                <div class="form-group">
                  <label>Roles</label>
                  <select name="roles" id="" class="form-control">
                    <option value="">-=Pilih Posisi=-</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin gudang</option>
                    <option value="3">kasir</option>
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