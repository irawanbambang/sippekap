
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Masukkan Data Diri</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration');  ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nik" placeholder="NIK" name="nik" value="<?= set_value('nik'); ?>"><?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>"><?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>"><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1"><?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_hp" placeholder="Nomor Handphone" name="no_hp" value="<?= set_value('no_hp'); ?>"><?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki">
                      <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                      <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                    </div>
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat Lengkap" name="alamat" value="<?= set_value('alamat'); ?>"><?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="rt" placeholder="RT" name="rt" value="<?= set_value('rt'); ?>"><?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="rw" placeholder="RW" name="rw" value="<?= set_value('rw'); ?>"><?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="kelurahan" placeholder="Kelurahan" name="kelurahan"><?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="kecamatan" placeholder="Kecamatan" name="kecamatan"><?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="provinsi" placeholder="Provinsi" name="provinsi" value="<?= set_value('provinsi'); ?>"><?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kota" placeholder="Kota" name="kota" value="<?= set_value('kota'); ?>"><?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Masuk
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/');  ?>">Sudah memiliki Akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>