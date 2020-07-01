

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 border-bottom-danger"><?= $title; ?></h1>


          <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>NAMA</th>
                      <th>ALAMAT</th>
                      <th>NO HP</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data_pemohon as $key) {?>
                    <tr>
                      <td><?= $key['nik'] ?></td>
                      <td><?= $key['nama'] ?></td>
                      <td><?= $key['alamat'] ?></td>
                      <td><?= $key['no_hp'] ?></td>
                      <td>
                        <!-- <a href="<?= base_url('index.php/') ?>admin/hapus_pemohon/<?= $key['nik'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-box btn-sm">
                        <i class="fas fa-fw fa-trash-alt"></i>
                        </a> -->
                        <a href="<?= base_url('admin/detail_data_pemohon'); ?>" class="btn btn-warning btn-box btn-sm"><i class="fas fa-fw fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

        
    </div>

