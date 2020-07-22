        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-8">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>
          <div class="card mb-3 col-lg-6">
            <div class="row no-gutters">
              <?php foreach ($pengguna as $u) {?>
          
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <table class="table table-borderless">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?= $u['name']; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $u['email']; ?></td>
                    </tr>
                    <tr>
                      <td>NIK</td>
                      <td>:</td>
                      <td><?= $u['nik']; ?></td>
                    </tr>
                    <tr>
                      <td>No. Handphone</td>
                      <td>:</td>
                      <td><?= $u['no_hp']; ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?= $u['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?= $u['alamat']; ?>, RT : <?= $u['rt']; ?> / RW : <?= $u['rw']; ?>, Kelurahan : <?= $u['kelurahan']; ?>, Kecamatan : <?= $u['kecamatan']; ?>, Kota : <?= $u['kota']; ?>, Provinsi : <?= $u['provinsi']; ?></td>
                    </tr>
                  </table>
                  <!-- <h5 class="card-title"><?= $u['name']; ?></h5> -->
                  <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $u['date_created']); ?></small></p>
                </div>

               <?php } ?>
                <div class="form-group row  justify-content-end">
                  <div class="col-sm-5">
                    <a href="<?= base_url('user/edit'); ?>" type="submit" class="btn btn-primary">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

