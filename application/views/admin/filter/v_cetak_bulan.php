        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h5 mb-3 col-lg-6 text-gray-800 border-bottom-warning"><b><?= $title; ?></b></h2>

          
          <div class="card mb-3 col-lg-6">
            <p class="mb-1"><i class="fas fa-fw fa-filter"></i>&nbsp<b>Filter</b></p>
            <hr>
            <td><b>Bulan :</b></td>
            <div class="row">
            <div class="col-lg-6">
            <td>  
              <select class="form-control form-control-user" name="bulan" id="bulan" required>
                <option value="1">Januari</option>  
                <option value="2">Februari</option>  
                <option value="3">Maret</option>  
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </td>
            </div>

              <div class="col-lg-6">
              <td>
              <select class="form-control form-control-user" name="bulan" id="bulan" required>
                <option value="1">2009</option>  
                <option value="2">2010</option>  
                <option value="3">2011</option>  
                <option value="4">2012</option>
                <option value="5">2013</option>
                <option value="6">2014</option>
                <option value="7">2015</option>
                <option value="8">2016</option>
                <option value="9">2017</option>
                <option value="10">2018</option>
                <option value="11">2019</option>
                <option value="12">2020</option>
              </select>
            </td>
            </div>
            </div>

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

