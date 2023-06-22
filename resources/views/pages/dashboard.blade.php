<x-app-layout>
     <!--Container Main start-->
     <div class="row" id="chart">
        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header p-3">
              <h6 class="m-0 font-weight-bold text-primary">Grafik Surat Masuk & Surat Keluar Tahun {{ date('Y') }}</h6>
            </div>
            <div class="card-body">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Container Main end -->
      <!-- Content Row -->
      <div class="row">
  
        <!-- jumlah surat masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <a class="link  text-xs font-weight-bold text-primary text-uppercase mb-1" href="./surat_masuk.php">
                                  Jumlah Surat Masuk</a>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $surat_masuk }}
                                  </div>
                              </div>
                              <div class="col-auto card-image">
                              <img src="icon/mail_icon.png">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
          <!-- jumlah surat keluar -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="link text-xs font-weight-bold text-danger text-uppercase mb-1" href="./surat_keluar.php">
                                    Jumlah Surat Keluar</a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      {{ $surat_keluar }}
                                    </div>
                              </div>
                                <div class="col-auto card-image">
                                    <img src="icon/send_icon.png">
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
</x-app-layout>