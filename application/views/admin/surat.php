        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 border-bottom-danger"><?= $title; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Nomor Surat</th>
                      <th>Tanggal Terbit</th>
                      <th>NIK Pemilik</th>
                      <th>Nama Pemilik</th>
                      <th>Nama Kapal</th>
                      <th>Stempel</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($pengesahan as $ps) {?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $ps['no_surat'] ?></td>
                      <td><?= $ps['tgl_terbit'] ?></td>
                      <td><?= $ps['nik'] ?></td>
                      <td><?= $ps['nama'] ?></td>
                      <td><?= $ps['nama_kapal'] ?></td>
                      <?php if($ps['status'] == 'stempel') {?>
                        <td><span class="badge badge-success">Sudah</span></td>
                      <?php } else { ?>
                        <td><span class="badge badge-danger">Belum</span></td>
                      <?php } ?>
                      <td>
                          <a href="" class="btn btn-warning btn-box btn-sm"><i class="fas fa-fw fa-eye"></i>
                          </a>
                          <?php if($ps['status'] != 'stempel') { ?>
                          <a href="" class="btn btn-primary btn-box btn-sm"><i class="fas fa-fw fa-cloud-upload-alt"></i>
                          </a>
                          <a href="" class="btn btn-success btn-box btn-sm"><i class="fas fa-fw fa-print"></i>
                          </a>
                          <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
             <input type="text" class="form-control" id="title" name="title" placeholder="Nomor Surat">
          </div>
          <div class="form-group">
              <input type="date" class="form-control" id="url" name="url" placeholder="Tanggal Terbit">
          </div>
          <div class="form-group">
              <input type="date" class="form-control" id="url" name="url" placeholder="Tanggal Kadaluarsa">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" placeholder="Catatan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>