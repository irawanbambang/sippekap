        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php foreach ($pengajuan as $p) {
            $id_kp = $p['id_kp'];
            $no_pas = $p['no_pas'];
            $tgl_terbit = $p['tgl_terbit'];
            $tgl_kadaluwarsa = $p['tgl_kadaluwarsa'];
            $penerbit = $p['penerbit'];
            $asal_ktp = $p['asal_ktp'];
            $nik = $p['nik'];
            $nama_kapal = $p['nama_kapal'];
            $tanda_selar = $p['tanda_selar'];
            $jenis_alat = $p['jenis_alat'];
            $berat = $p['berat'];
            $muatan = $p['muatan'];
            $kekuatan = $p['kekuatan'];
            $merk_mesin = $p['merk_mesin'];
            $no_mesin = $p['no_mesin'];
            $bahan = $p['bahan'];
            $penangkapan = $p['penangkapan'];
            $pangkalan = $p['pangkalan'];
            $anak_buah = $p['anak_buah'];
            $upload_ktp = $p['upload_ktp'];
            $upload_pas = $p['upload_pas'];
            $upload_kapal_datang = $p['upload_kapal_datang'];

          } ?> 

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Form Pendaftaran Perizinan Kapal</h1>


          <div class="gropup row">
          <?= validation_errors(); ?>
          <?= form_open_multipart('form/simpan'); ?>
            <div class="col-md-6 col-xl-12">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">PAS KECIL</h5>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                    <h7>No. Pas Kecil</h7>
                    <br>
                      <input type="text" class="form-control" id="no_pas" name="no_pas" value="<?= $no_pas ?>"><?= form_error('no_pas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                    <h7>Tanggal Terbit</h7>
                        <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" value="<?= $tgl_terbit ?>">
                    </div>
                    <div class="form-group">
                    <h7>Tanggal Kadaluarsa</h7>
                        <input type="date" class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" value="<?= $tgl_kadaluwarsa ?>">
                    </div>
                    <div class="form-group">
                    <h7>Penerbit</h7>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit">
                    </div>
                  </div>
              </div>
            </div>
            </br>

            <div class="col-xl-5 col-lg-7">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newSubMenuModalLabel">IDENTITAS PEMILIK KAPAL</h5>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                    <h7>KTP Asli</h7>
                    <br>
                       <input type="text" class="form-control" value="<?= $asal_ktp ?>">
                    </div>
                    <div class="form-group">
                    <h7>NIK Pemilik</h7>
                        <input type="text" class="form-control" placeholder="Entri NIK....." value="<?= $nik ?>" disabled>
                         <input type="hidden" class="form-control" id="nik" name="nik" placeholder="Entri NIK....." value="<?= $this->session->userdata('nik'); ?>">
                    </div>
                  </div>
              </div>
            </div>
            </br>


            <div class="col-xl-7 col-lg-7">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">IDENTITAS KAPAL</h5>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                    <h7>Nama Kapal</h7>
                      <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" value="<?= $nama_kapal ?>">
                    </div>
                    <div class="form-group">
                    <h7>Tanda Selar</h7>
                      <input type="text" class="form-control" id="tanda_selar" name="tanda_selar" value="<?= $tanda_selar ?>">
                    </div>
                    <div class="form-group">
                    <h7>Jenis Penangkapan Ikan</h7>
                      <select class="form-control form-control-user" name="jenis_alat" id="jenis_alat">
                        <option <?php if ($jenis_alat=='jaring_insang') {echo "selected";} ?> value="1">Jaring Insang (Gill Net)</option>  
                        <option <?php if ($jenis_alat=='pukat_kantong') {echo "selected";} ?> value="2">Pukat Kantong (Seine Net)</option>  
                        <option <?php if ($jenis_alat=='jaring_angkat') {echo "selected";} ?> value="3">Jaring Angkat (Lift Net)</option>  
                        <option <?php if ($jenis_alat=='pancing') {echo "selected";} ?> value="4">Pancing (Hook & Lines)</option>
                        <option <?php if ($jenis_alat=='perangkap') {echo "selected";} ?> value="5">Perangkap (Traps)</option>
                        <option <?php if ($jenis_alat=='lainnya') {echo "selected";} ?> value="lainnya">Lainnya... (Isi Manual)</option>
                      </select>
                      <input type="text" class="form-control mt-2" id="jenis_lain" name="jenis_lain" placeholder="...." hidden>
                    </div>
                    <div class="form-group">
                    <h7>Berat kapal GT</h7>
                      <input type="text" class="form-control" id="berat" name="muatan" value="<?= $berat ?>">
                    </br>
                    </div>
                    <h7>Muatan Bersih</h7>
                    <div class="form-group">
                      <input type="text" class="form-control" id="muatan" name="muatan" value="<?= $muatan ?>"><label>NT</label>
                    </div>
                    <h7>Kekuatan Mesin (PK)</h7>
                    <div class="input-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control" id="kekuatan" name="kekuatan" value="<?= $kekuatan  ?>">
                      </div>
                      <text>Kekuatan mesin bisa diisi lebih dari 1, sesuai dengan jumlah mesin kapal yang digunakan. Klik tombol + untuk memasukkan kekuatan mesin.</text>
                    </div>
                    <div class="form-group">
                    <h7>Merk Mesin</h7>
                      <input type="text" class="form-control" id="merk_mesin" name="merk_mesin" value="<?= $merk_mesin ?>">
                    </div>
                    <div class="form-group">
                    <h7>No. Mesin</h7>
                      <input type="text" class="form-control" id="no_mesin" name="no_mesin" value="<?= $no_mesin ?>">
                    </div>
                    <div class="form-group">
                    <h7>Bahan Kapal</h7>
                      <select class="form-control form-control-user" name="bahan" id="bahan">
                        <option <?php if ($jenis_alat== 'kayu') {echo "selected";} ?> value="kayu">Kayu</option>  
                        <option <?php if ($jenis_alat== 'besi') {echo "selected";} ?> value="besi">Besi / Baja</option>  
                        <option <?php if ($jenis_alat== 'fiber') {echo "selected";} ?> value="fiber">Fiber Glass</option>
                        <option <?php if ($jenis_alat== 'lain') {echo "selected";} ?> value="lain">Lainnya... (Isi Manual)</option>  
                      </select>
                      <input type="text" class="form-control mt-2" id="bahan_lain" name="bahan_lain" placeholder="...." hidden>
                    </div>
                    <div class="form-group">
                    <h7>Daerah Penangkapan</h7>
                      <input type="text" class="form-control" id="penangkapan" name="penangkapan" value="<?= $penangkapan ?>">
                    </div>
                    <div class="form-group">
                    <h7>Pelabuhan Penangkalan</h7>
                        <input type="text" class="form-control" id="pangkalan" name="pangkalan" value="<?= $pangkalan ?>">
                    </div>
                    
                    <h7>Anak Buah Kapal</h7>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="anak_buah" name="anak_buah" value="<?= $anak_buah ?>">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">orang</span>
                        </div>
                    </div>
                  </div>
              </div>
              </br>


              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Upload Berkas (Jpg, Jpeg, Png)<text>ukuran file maksimal 10MB</text></h5>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                    <h7>Fotokopi KTP</h7>
                      <div class="col-md-4">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="upload_pas" name="upload_pas">
                          <label class="custom-file-label" for="upload_pas">Choose file</label>
                      </div>
                        <img src="<?= base_url()?>assets/upload_image/<?= $upload_ktp ?>" class="card-img">
                      </div>
                    </div>
                    <div class="form-group">
                    <h7>Fotokopi Pas Kecil</h7>
                      <div class="col-md-4">
                        <img src="<?= base_url()?>assets/upload_image/<?= $upload_pas ?>" class="card-img">
                      </div>
                    </div>
                    <div class="form-group">
                    <h7>Fotokopi Surat Kedatangan Kapal</h7>
                      <div class="col-md-4">
                        <img src="<?= base_url()?>assets/upload_image/<?= $upload_kapal_datang ?>" class="card-img">
                      </div>
                    </div>
                  </div>
              </div>
              </br>
              <div>
            <button type="submit" class="btn btn-success">Ubah</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
          </div>
        </div>
        <!-- /.container-fluid -->
        <script>
          $('#jenis_alat').change(function(){
            let lainnya = $('#jenis_alat').val();
            console.log(lainnya);
            if(lainnya == 'lainnya') {
              $('#jenis_lain').attr('hidden', false);
            } else {
              $('#jenis_lain').attr('hidden', true);
            }
          });
        </script>

        <script>
          $('#bahan').change(function(){
            let lain = $('#bahan').val();
            console.log(lain);
            if(lain == 'lain') {
              $('#bahan_lain').attr('hidden', false);
            } else {
              $('#bahan_lain').attr('hidden', true);
            }
          });
        </script>

      </div>
      <!-- End of Main Content -->

