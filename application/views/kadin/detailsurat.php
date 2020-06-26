<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a class="btn-sm btn-primary" href="<?= base_url('kadin/pengajuan'); ?>"><i class="fas fa-fw fa-arrow-left"></i></a>
            &nbspData Pasien / <?= $pasien['nama']; ?>
        </h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 border-right">
            	<img class="img-fluid mt-3 mb-4" style="width: 15rem;" src="<?= base_url('assets/img/ilustrasi/') ?>pasien.svg" alt="">
            	<p class="mb-1"><b>NIK :</b></p>
            		<p><?= $pasien['nik'] ?></p>
            	<p class="mb-1"><b>Nama :</b></p>
            		<p><?= $pasien['nama'] ?></p>
            	<p class="mb-1"><b>Jenis Kelamin :</b></p>
            		<?php if($pasien['jekel'] == 0) { ?>
	            		<p>Laki-Laki</p>
            		<?php } else { ?>
            			<p>Perempuan</p>
            		<?php } ?>
            	<p class="mb-1"><b>Tempat & Tanggal Lahir :</b></p>
            		<p><?= $pasien['tempat_lahir'] ?>, <?= date_indo($pasien['tanggal_lahir']); ?></p>
            	<p class="mb-1"><b>Agama :</b></p>
            		<p><?= $pasien['agama'] ?></p>
            	<p class="mb-1"><b>Pendidikan Terakhir :</b></p>
            		<p><?= $pasien['pendidikan'] ?></p>
            	<p class="mb-1"><b>Pekerjaan :</b></p>
            		<p><?= $pasien['pekerjaan'] ?></p>
            </div>
            <div class="col-lg-8">
                <p class="mb-1"><b>Provinsi :</b></p>
                    <p><?= $pasien['nama_prov'] ?></p>
                <p class="mb-1"><b>Kota / Kabupaten :</b></p>
                    <p><?= $pasien['nama_kota_kab'] ?></p>
                <p class="mb-1"><b>Kecamatan :</b></p>
                    <p><?= $pasien['nama_kec'] ?></p>
                <p class="mb-1"><b>Kelurahan :</b></p>
                    <p><?= $pasien['nama_kel'] ?></p>
                <p class="mb-1"><b>Alamat :</b></p>
                    <p><?= $pasien['alamat'] ?></p>
                <p class="mb-1"><b>No.HP :</b></p>
            		<p><?= $pasien['hp'] ?></p>
            	<p class="mb-1"><b>Email :</b></p>
            		<p><?= $pasien['email'] ?></p>
            	<p class="mb-1"><b>Terakhir Login Aplikasi :</b></p>
            		<?php if($pasien['terakhir_login'] == null) { ?>
	            		<p>Belum Pernah Login</p>
            		<?php } else { ?>
            			<p><?= date_indo($pasien['terakhir_login']) ?></p>
            		<?php } ?>
            	<p class="mb-1"><b>Akun Aplikasi :</b></p>
            		<?php if($pasien['aktif'] == 0) { ?>
	            		<p>Tidak Aktif</p>
            		<?php } else { ?>
            			<p>Aktif</p>
            		<?php } ?>
            </div>
        </div>
    </div>
</div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->