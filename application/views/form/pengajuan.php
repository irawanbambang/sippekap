        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 border-bottom-danger"><?= $title; ?></h1>

          <?= $this->session->flashdata('message'); ?>

         	<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
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
                  <?php $no=1; foreach ($pengajuan as $p) :?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $p['no_pas'] ?></td>
                      <td><?= $p['tgl_terbit'] ?></td>
                      <td><?= $p['nik'] ?></td>
                      <td><?= $p['nama_kapal'] ?></td>
                      <td><?= $p['status'] ?></td>
                      <td>
                        <?php if ($p['status'] == 'menunggu'|| $p['status'] == 'tolak'){ ?>
                        <a href="<?= base_url('index.php/') ?>form/edit/<?= $p['id_kp'] ?>" class="btn btn-primary btn-box btn-sm">
                          <i class="fas fa-fw fa-edit"></i>
                        </a>

                        <a href="<?= base_url('index.php/') ?>form/usulkan/<?= $p['id_kp'] ?>" onclick="return confirm('Yakin ingin mengusulkan data ini?')" class="btn btn-info btn-box btn-sm"><i class="fas fa-fw fa-hand-holding"></i>Usulkan</i>
                        </a>
                        <?php } ?>

                        <?php if ($p['status'] == 'tolak'){ ?>
                        <a type="button" class="fas fa-fw fa-envelope" ></a>
                        <?php } ?>

                        <?php if ($p['status'] == 'terima' || $p['status'] == 'stempel'){ ?>
                        <a href="<?= base_url('index.php/') ?>form/cetak/<?= $p['id_kp'] ?>" onclick="return confirm('Yakin ingin mengusulkan data ini?')" class="btn btn-success btn-box btn-sm">
                          <i class="fas fa-fw fa-print"></i>
                        </a>

                        <?php } ?>
                        
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
  					<ul class="pagination">
    					<li class="page-item">
      					<a class="page-link" href="#" aria-label="Previous">
        					<span aria-hidden="true">&laquo;</span>
      					</a>
    					</li>
    					<li class="page-item"><a class="page-link" href="#">1</a></li>
    					<li class="page-item"><a class="page-link" href="#">2</a></li>
    					<li class="page-item"><a class="page-link" href="#">3</a></li>
    					<li class="page-item">
      					<a class="page-link" href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      					</a>
    					</li>
  					</ul>
					</nav>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Pesan Kesalahan Pendaftaran !</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <p></p>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>