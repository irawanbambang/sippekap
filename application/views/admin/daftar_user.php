        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 border-bottom-danger"><?= $title; ?></h1>


          <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>ROLE_ID</th>
                      <th>IS_ACTIVE</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($daftar as $key) {?>
                    <tr>
                      <td><?= $key['id'] ?></td>
                      <td><?= $key['name'] ?></td>
                      <td><?= $key['email'] ?></td>
                      <td><?php if($key['role_id']=="1"){echo "Admin";}elseif($key['role_id']=="2"){echo "Member";}else{echo "Kadin";} ?></td>
                      <td><?php if($key['is_active']=="0"){echo "<i class='badge badge-danger'>Non Aktif</i>";}elseif($key['is_active']=="1"){echo "<i class='badge badge-success'>Aktif</i>";}?></td>
                      <td>
                        <a href="<?= base_url('index.php/') ?>admin/edit/<?= $key['id'] ?>" class="btn btn-primary btn-box btn-sm" title="Edit">
                          <i class="fas fa-fw fa-edit"></i>
                        </a>
                        <a href="<?= base_url('index.php/') ?>admin/hapus/<?= $key['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-box btn-sm" title="Hapus">
                          <i class="fas fa-fw fa-trash-alt"></i>                        
                        </a>
                        <?php if($key['is_active']=="0"){?>
                          <a href="<?= base_url('index.php/') ?>admin/ubah_aktifasi/<?= $key['id'] ?>/<?= $key['is_active'] ?>" onclick="return confirm('Yakin ingin mengubah data ini?')" class="btn btn-success btn-box btn-sm" title="Aktif"><i class="fas fa-fw fa-check"></i></a>
                        <?php }elseif($key['is_active']=="1"){?>
                          <a href="<?= base_url('index.php/') ?>admin/ubah_aktifasi/<?= $key['id'] ?>/<?= $key['is_active'] ?>" onclick="return confirm('Yakin ingin mengubah data ini?')" class="btn btn-warning btn-box btn-sm" title="Non Aktif"><i class="fas fa-fw fa-times"></i></a>
                        <?php }?>  
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

