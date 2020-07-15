        <!-- Begin Page Content -->
      <?php foreach ($data_pemohon as $dp) { ?>
        
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-8">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <div class="card mb-3 col-lg-6">
            <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nik" placeholder="NIK" name="nik" value="<?= $dp['nik']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?= $dp['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= $dp['email']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_hp" placeholder="Nomor Handphone" name="no_hp" value="<?= $dp['no_hp']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" value="<?= $dp['jenis_kelamin']; ?>" disabled>
                </div>
              
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat Lengkap" name="alamat" value="<?= $dp['alamat']; ?>" disabled>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="rt" placeholder="RT" name="rt" value="<?= $dp['rt']; ?>" disabled>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="rw" placeholder="RW" name="rw" value="<?= $dp['rw']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="kelurahan" placeholder="Kelurahan" name="kelurahan" value="<?= $dp['kelurahan']; ?>" disabled>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="kecamatan" placeholder="Kecamatan" name="kecamatan" value="<?= $dp['kecamatan'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="provinsi" placeholder="Provinsi" name="provinsi" value="<?= $dp['provinsi']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kota" placeholder="Kota" name="kota" value="<?= $dp['kota']; ?>" disabled>
                </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  <?php } ?>
