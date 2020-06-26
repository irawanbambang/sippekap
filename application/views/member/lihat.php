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
              <div class="col-md-4">
                <img src="<?= base_url('assets/upload_image/') . $tb_identitas_pemilik['image']; ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $tb_identitas_pemilik['nik']; ?></h5>
                  <p class="card-text"><?= $tb_identitas_pemilik['no_hp']; ?></p>
                </div>
                <div class="form-group row  justify-content-end">
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

