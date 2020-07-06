        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 border-bottom-danger"><?= $title; ?></h1>

          <?= $this->session->flashdata('message'); ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="dropdown">
                  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download"></i> Cetak Laporan
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url('admin/cetak_tanggal') ?>">Tanggal/Bulan/Tahun</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/cetak_bulan') ?>">Bulan/Tahun</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/cetak_tahun') ?>">Tahun</a>
                  </div>
                </div>
                <br/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Nomor_Pas</th>
                      <th>Tanggal Pengajuan</th>
                      <th>NIK Pemilik</th>
                      <th>Nama Kapal</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($pengajuan as $p) {?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $p['no_pas'] ?></td>
                      <td><?= $p['tgl_terbit'] ?></td>
                      <td><?= $p['nik'] ?></td>
                      <td><?= $p['nama_kapal'] ?></td>
                      <td><?= $p['status'] ?></td>
                      <td>
                        <?php if ($p['status'] == 'terima'){ ?>
                        <a href="<?= base_url('index.php/') ?>form/cetak/<?= $p['id_kp'] ?>" onclick="return confirm('Yakin ingin mengusulkan data ini?')">
                          <button class="badge badge-info btn-xs"><li class="fa fa-trash-o"></li>Cetak</button>
                        </a>
                        <?php } ?>
                        <?php if ($p['status'] != 'disahkan'){ ?>
                        <a href="<?= base_url('index.php/admin/lihat_pengajuan/') . $p['id_kp'] ?>" class="btn btn-warning btn-box btn-sm"><i class="fas fa-fw fa-eye"></i>
                        </a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
          </nav>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

