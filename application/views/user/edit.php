  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
    	<div class="col-lg-8">
    		
    		<?= form_open_multipart('user/edit'); ?>
        <?php foreach ($pengguna as $u) {?>
    		<div class="form-group row">
    			<label for="email" class="col-sm-2 col-form-label">Email</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="email" name="email" value="<?= $u['email']; ?>" readonly>
   			 	</div>
  			</div>
  			<div class="form-group row">
    			<label for="name" class="col-sm-2 col-form-label">Full Name</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="name" name="name" value="<?= $u['name']; ?>">
      				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $u['id_user']; ?>">
   			 	</div>
  			</div>
        <div class="form-group row">
          <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $u['no_hp']; ?>">
              <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="no_hp" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
              <select class="form-control form-control-user" name="jenis_kelamin" id="jenis_kelamin" required>
                          <option value="Laki-laki" <?php if($u['jenis_kelamin']=='Laki-Laki'){echo "selected";}?>>Laki-Laki</option>  
                          <option value="Perempuan" <?php if($u['jenis_kelamin']=='Perempuan'){echo "selected";}?>>Perempuan</option>  
              </select>
          </div>
        </div>
       <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $u['alamat']; ?>">
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="rt" class="col-sm-2 col-form-label">RT</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="rt" name="rt" value="<?= $u['rt']; ?>">
              <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <label for="rw" class="col-sm-2 col-form-label">RW</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="rw" name="rw" value="<?= $u['rw']; ?>">
              <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $u['kelurahan']; ?>">
              <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $u['kecamatan']; ?>">
              <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="kota" class="col-sm-2 col-form-label">Kota</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="kota" name="kota" value="<?= $u['kota']; ?>">
              <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $u['provinsi']; ?>">
              <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
  			<div class="form-group row">
    			<div class="col-sm-2">Picture</div>
    			<div class="col-sm-10">
    				<div class="row">
    					<div class="col-sm-3">
    						<img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="img-thumbnail">
    					</div>
    						<div class="col-sm-9">
    						<div class="custom-file">
  								<input type="file" class="custom-file-input" id="image" name="image">
  								<label class="custom-file-label" for="image">Choose file</label>
							</div>
						</div>
    				</div>
    			</div>
  			</div>
        <?php } ?>

  			<div class="form-group row  justify-content-end">
  				<div class="col-sm-10">
  					<button type="submit" class="btn btn-primary">Edit</button>
  				</div>
  			</div>

    		</form>
    	</div>
    </div>

         
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->