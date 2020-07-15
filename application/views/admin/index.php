        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <!-- Custom fonts for this template-->
          <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-sm-6 mb-7">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daftar Pengajuan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $t_pengajuan; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-sm-6 mb-7">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Daftar Surat Perizinan Kapal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $t_perizinan; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-sm-6 mb-7">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Daftar Pemohon</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $t_pemohon; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            </div>
          </div>

          <div class="row">
              
            <!-- Donut Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kapal Dalam Kota & Luar Kota</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <canvas id="kota_chart"></canvas>
                </div>
              </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Member Laki-Laki & Perempuan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <canvas id="jekel_chart"></canvas>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-donut-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-doughnut-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

  <script>
    //Diagram Kota
    let dalam_kota = "<?php echo $c_kota['dalam'] ?>";
    let luar_kota = "<?php echo $c_kota['luar'] ?>";

    var ctxD = document.getElementById("kota_chart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
      labels: ["Dalam Kota", "Luar Kota"],
      datasets: [{
        data: [dalam_kota, luar_kota],
        backgroundColor: ["#808080", "#ADFF2F"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
      }]
    },
    options: {
      responsive: true
      }
    });

    
    
    //Diagram Jenis Kelamin
    let cowok = "<?php echo $c_jekel['cowok'] ?>";
    let cewek = "<?php echo $c_jekel['cewek'] ?>";

    var ctxD = document.getElementById("jekel_chart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
      labels: ["Laki-Laki", "Perempuan"],
      datasets: [{
        data: [cowok, cewek],
        backgroundColor: ["#808080", "#ADFF2F"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
      }]
    },
    options: {
      responsive: true
      }
    });
  </script>