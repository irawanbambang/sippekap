        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h5 mb-3 col-lg-6 text-gray-800 border-bottom-warning"><b><?= $title; ?></b></h2>

          <?= form_open_multipart('admin/excel'); ?>
          <div class="card mb-3 col-lg-6">
            <p class="mb-1"><i class="fas fa-fw fa-filter"></i>&nbsp<b>Filter</b></p>
            <hr>
            <td><b>Tanggal :</b></td>
            <td>
              <div class="form-group">
                <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" placeholder="Tanggal Terbit">
              </div>
            </td>

              <div class="form-group">
                <h7>&nbsp<b>Asal Kapal</b></h7>
                      </br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="asal" id="inlineRadio1" value="1" required>
                          <label class="form-check-label" for="inlineRadio1">Dalam Kota</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="asal" id="inlineRadio2" value="2" required>
                          <label class="form-check-label" for="inlineRadio2">Luar Kota</label>
                        </div>
              </div>

            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbspBatal</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-download"></i>&nbspCetak</button>
        </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

