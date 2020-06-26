
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900"><b>LOGIN</h1>
                  </div>
                  <div class="text-center"
                  >
                    <img class="mb-3" src="<?= base_url('assets/img/logo/logo-pemkot.png') ?>" width="150px" height="197px">
                  </div>
                  <div class="text-center">
                    <h1 class="h3"><font face="sans-serif" color="aqua"><b>SIPPEKAP</h1>
                    <h2 class="h6 text-gray-900">SISTEM PENDAFTARAN KAPAL PERIKANAN</h2>
                  </div>
                  

                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('auth');  ?>">
                    <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>"><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password"><?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/lupapassword'); ?>">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/identitas'); ?>">Buat Akun Baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

