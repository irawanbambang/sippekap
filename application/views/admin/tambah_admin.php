<div class="modal-content">
<div class="row">
    <div class="col-lg">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form action="<?= base_url('admin/simpan'); ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                <h7>Nama</h7>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                </div>
                <div class="form-group">
                <h7>Email</h7>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                <h7>Password</h7>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                <h7>Role_id</h7>
                    <select class="form-control form-control-user" name="role_id" id="role_id">
                    <option value="1">Admin</option>  
                    <option value="3">Kadin</option> 
                  </select>
                </div>
              </div>
              <button type="submit">Simpan</button>
            </form>
          </div>
        </div>
    </div>
</div>