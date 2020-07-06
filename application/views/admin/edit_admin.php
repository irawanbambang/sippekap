<?php foreach ($admin as $k) {
    $id = $k['id'];
    $name = $k['name'];
    $email = $k['email'];
    $password = $k['password'];
    $role_id = $k['role_id'];
} ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSubMenuModalLabel">IDENTITAS PEMILIK KAPAL</h5>
        </div>
        <form action="<?= base_url('admin/ubah'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
            <h7>Nama</h7>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="<?= $name ?>"disabled>
                <input type="hidden" class="form-control" id="name" name="name" placeholder="Nama" value="<?= $name ?>">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Nama" value="<?= $id ?>">
            </div>
            <div class="form-group">
            <h7>Email</h7>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $email ?>"disabled>
                <input type="hidden" class="form-control" id="email" name="email" placeholder="Email" value="<?= $email ?>">
            </div>
            <div class="form-group">
            <h7>Role_id</h7>
                <select class="form-control form-control-user" name="role_id" id="role_id">
                <option <?php if($role_id == '1'){echo "selected";} ?> value="1">Admin</option>  
                <option <?php if($role_id == '3'){echo "selected";} ?> value="3">Kadin</option> 
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <a href="" onclick="return confirm('Yakin ingin mengubah data ini?')">
            <button class="btn btn-success btn-xs" type="submit">Ubah</button>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>