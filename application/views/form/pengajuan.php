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
                        <a href="<?= base_url('index.php/') ?>form/edit/<?= $p['id_kp'] ?>" class="btn btn-primary btn-box btn-sm" title="Ubah">
                          <i class="fas fa-fw fa-edit"></i>
                        </a>

                        <a href="<?= base_url('index.php/') ?>form/usulkan/<?= $p['id_kp'] ?>" onclick="return confirm('Yakin ingin mengusulkan data ini?')" class="btn btn-info btn-box btn-sm" title="Usulkan"><i class="fas fa-fw fa-hand-holding"></i></i>
                        </a>
                        <?php } ?>

                        <?php if ($p['status'] == 'tolak'){ ?>
                        <a href="" onclick="lihat_pesan('<?= $p['id_kp'] ?>')" type="button" data-toggle="modal" data-target="#newSubMenuModalPesa" class="btn btn-secondary btn-box btn-sm" title="pesan"><i class="fas fa-fw fa-envelope"></i> </a>
                        <?php } ?>

                        <?php if ($p['status'] == 'terima' || $p['status'] == 'stempel'){ ?>
                        <a href="<?= base_url('Form/pdf') ?>" class="btn btn-success btn-box btn-sm" title="cetak">
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

<!-- Modal Pesan -->
<div class="modal" id="newSubMenuModalPesa" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Pesan</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="<?= base_url('form/tolak'); ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id_kp">
          <div class="form-group">
              <textarea class="form-control" id="pesan" name="textarea"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function lihat_pesan(id)
{
    $.ajax({
        url : "<?php echo site_url('admin/ambil_pesan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_kp"]').val(data.id_kp);
            $('[name="pesan"]').val(data.pesan);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
<!-- 
<script>
function lihat_pesan(id)
{
   alert(id);
}
</script> -->