  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
    	<div class="col-lg-8">
    		<?= form_open_multipart('Member/Simpan'); ?>
    		<div class="form-group row">
    			<div class="col-sm-10">
          <label for="email" class="col-sm-4 col-form-label">NIK Pemilik</label>
      				<input type="text" class="form-control" id="nik" name="nik">
              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
   			 	</div>
  			</div>
  			<div class="form-group row">
    			<div class="col-sm-10">
          <label for="name" class="col-sm-4 col-form-label">Nama Pemilik</label>
      				<input type="text" class="form-control" id="nama" name="nama">
      				<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
   			 	</div>
  			</div>
        <div class="form-group row">
          <div class="col-sm-10">
          <label for="name" class="col-sm-4 col-form-label">No Handphone</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
          <label for="name" class="col-sm-10 col-form-label">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                <label class="form-check-label" for="inlineRadio1">Perempuan</label>
              </div>
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <label for="name" class="col-sm-4 col-form-label">Alamat Lengkap</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
          <label for="name" class="col-sm-4 col-form-label">RT</label>
              <input type="text" class="form-control" id="rt" name="rt">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="col-sm-5">
          <label for="name" class="col-sm-4 col-form-label">RW</label>
              <input type="text" class="form-control" id="rw" name="rw">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
          <label for="name" class="col-sm-4 col-form-label">Kelurahan</label>
              <input type="text" class="form-control" id="kelurahan" name="kelurahan">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="col-sm-5">
          <label for="name" class="col-sm-4 col-form-label">Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          
          <div class="col-sm-10">
          <label for="name" class="col-sm-2 col-form-label">Provinsi</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          
          <div class="col-sm-10">
          <label for="name" class="col-sm-2 col-form-label">Kota</label>
              <input type="text" class="form-control" id="kota" name="kota">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>

  			<div class="form-group row">	
    		<div class="col-sm-10">
          <div class="col-sm-5">Upload Gambar KTP</div>
    				<div class="row">
    					<div class="col-sm-3">
    						<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
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

  			<div class="form-group row  justify-content-end">
  				<div class="col-sm-12">
  					<button type="submit" class="btn btn-primary">Simpan</button>
  				</div>
  			</div>

    		</form>
    	</div>
    </div>

         
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->