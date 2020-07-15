<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-5 ml-3" width="40%" src="<?= base_url('assets/img/logo/logo-pemkot.png') ?>" alt="">
                                <h4 class="h4 text-primary ml-4 mt-4 mb-4"><b>Dinas Kelautan dan Perikanan<br/>Kota Pekalongan</b></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="h4 text-primary mb-4"><b>Ubah password untuk @admindkp@gmail.com<?= $this->session->userdata('reset_email'); ?></b></h4>
                                </div>

                                <?= $this->session->flashdata('message') ?>

                                <form class="user" method="POST" action="<?= base_url('auth/ubahpassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password Baru">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Ubah Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>