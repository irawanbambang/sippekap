        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Form Pendaftaran Perizinan Kapal</h1>


          <?= validation_errors(); ?>
          <?= form_open_multipart('form/simpan'); ?>
            <div class="row">
              <div class="col-6">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">IDENTITAS PEMILIK KAPAL</h5>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                      <h7>KTP Asli</h7>
                      <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="form-check-input" type="radio" name="asal_ktp" id="radio1" value="Kota Pekalongan" required>
                            <label class="form-check-label" for="radio1">Kota Pekalongan</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="form-check-input" type="radio" name="asal_ktp" id="radio2" value="Luar Kota Pekalongan" required>
                            <label class="form-check-label" for="radio2">Luar Kota Pekalongan</label>
                        </div>
                      </div>
                      <div class="form-group">
                      <h7>NIK Pemilik</h7>
                          <input type="text" class="form-control" placeholder="Entri NIK....." value="<?= $this->session->userdata('nik'); ?>" disabled>
                          <input type="hidden" class="form-control" id="nik" name="nik" placeholder="Entri NIK....." value="<?= $this->session->userdata('nik'); ?>">
                      </div>
                    </div>
                </div>
                <br/>
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">PAS KECIL</h5>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                      <h7>No. Pas Kecil</h7>
                      <br>
                        <input type="text" class="form-control" id="no_pas" name="no_pas" placeholder="Masukkan No Pas Kecil....." required>
                      </div>
                      <div class="form-group">
                      <h7>Tanggal Terbit</h7>
                          <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" required>
                      </div>
                      <div class="form-group">
                      <h7>Tanggal Kadaluarsa</h7>
                          <input type="date" class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" required>
                      </div>
                      <div class="form-group">
                      <h7>Penerbit</h7>
                          <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit" required>
                      </div>
                    </div>
                </div>
                <br/>
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Upload Berkas (Jpg, Jpeg, Png)<text>ukuran file maksimal 10MB</text></h5>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                      <h7>Fotokopi KTP</h7>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload_ktp" name="upload_ktp" required>
                            <label class="custom-file-label" for="upload_ktp">Choose file</label>
                        </div>
                      </div>
                      <div class="form-group">
                      <h7>Fotokopi Pas Kecil</h7>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload_pas" name="upload_pas" required>
                            <label class="custom-file-label" for="upload_pas">Choose file</label>
                        </div>
                      </div>
                      <div class="form-group">
                      <h7>Fotokopi Surat Kedatangan Kapal</h7>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload_kapal_datang" name="upload_kapal_datang" required>
                            <label class="custom-file-label" for="upload_kapal_datang">Choose file</label>
                        </div>
                      </div>
                    </div>
                </div>
                </br>
              </div>
              <div class="col-6">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">IDENTITAS KAPAL</h5>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                      <h7>Nama Kapal</h7>
                        <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" required>
                      </div>
                      <div class="form-group">
                      <h7>Tanda Selar</h7>
                        <input type="text" class="form-control" id="tanda_selar" name="tanda_selar" required>
                      </div>
                      <div class="form-group">
                      <h7>Jenis Penangkapan Ikan</h7>
                        <select class="form-control form-control-user" name="jenis_alat" id="jenis_alat" required>
                          <option value="jaring_insang">Jaring Insang (Gill Net)</option>  
                          <option value="pukat_kantong">Pukat Kantong (Seine Net)</option>  
                          <option value="jaring_angkat">Jaring Angkat (Lift Net)</option>  
                          <option value="pancing">Pancing (Hook & Lines)</option>
                          <option value="perangkap">Perangkap (Traps)</option>
                          <option value="lainnya">Lainnya... (Isi Manual)</option>
                        </select>
                        <input type="text" class="form-control mt-2" id="jenis_lain" name="jenis_lain" placeholder="...." hidden>
                      </div>
                      <div class="form-group">
                      <h7>Berat kapal GT</h7>
                      </br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berat" id="inlineRadio1" value="1" required>
                          <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berat" id="inlineRadio2" value="2" required>
                          <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berat" id="inlineRadio3" value="3" required>
                          <label class="form-check-label" for="inlineRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berat" id="inlineRadio4" value="4" required>
                          <label class="form-check-label" for="inlineRadio4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berat" id="inlineRadio5" value="5" required>
                          <label class="form-check-label" for="inlineRadio5">5</label>
                        </div>
                      </div>
                      <h7>Muatan Bersih</h7>
                      <div class="form-group">
                        <input type="text" class="form-control" id="muatan" name="muatan" required><label>NT</label>
                      </div>
                      <h7>Kekuatan Mesin (PK)</h7>
                      <div class="input-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="kekuatan" name="kekuatan" required>
                        </div>
                      </div>
                      <div class="form-group">
                      <h7>Merk Mesin</h7>
                        <input type="text" class="form-control" id="merk_mesin" name="merk_mesin" required>
                      </div>
                      <div class="form-group">
                      <h7>No. Mesin</h7>
                        <input type="text" class="form-control" id="no_mesin" name="no_mesin" required>
                      </div>
                      <div class="form-group">
                      <h7>Bahan Kapal</h7>
                        <select class="form-control form-control-user" name="bahan" id="bahan" required>
                          <option value="">- Pilih -</option>
                          <option value="kayu">Kayu</option>  
                          <option value="besi">Besi / Baja</option>  
                          <option value="fiber">Fiber Glass</option>  
                          <option value="lain">Lainnya... (Isi Manual)</option>
                        </select>
                        <input type="text" class="form-control mt-2" id="bahan_lain" name="bahan_lain" placeholder="...." hidden>
                      </div>
                      <div class="form-group">
                      <h7>Daerah Penangkapan</h7>
                        <input type="text" class="form-control" id="penangkapan" name="penangkapan" required>
                      </div>
                      <div class="form-group">
                      <h7>Pelabuhan Penangkalan</h7>
                          <input type="text" class="form-control" id="pangkalan" name="pangkalan" required>
                      </div>
                      
                      <h7>Anak Buah Kapal</h7>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="anak_buah" name="anak_buah" required>
                          <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">orang</span>
                          </div>
                      </div>
                    </div>
                </div>
                </div>
            </div>

        		<button type="submit" class="btn btn-success">Tambah</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <br/>
            <br/>
          </form>
        </div>
        <!-- /.container-fluid -->

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

      </div>
      <!-- End of Main Content -->

