<x-app-layout>
     <!--Container Main start-->
     <div class="row" id="chart">
        <div class="col-xl-6 col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header p-3">
              <h6 class="m-0 font-weight-bold text-primary">Grafik Surat Masuk Tahun {{ date('Y') }}</h6>
            </div>
            <div class="card-body">
              <h1></h1>
                    {{-- {!! $chart1->renderHtml() !!} --}}
                    <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header p-3">
              <h6 class="m-0 font-weight-bold text-primary">Grafik Surat Keluar Tahun {{ date('Y') }}</h6>
            </div>
            <div class="card-body">
              <h1></h1>
                    {{-- {!! $chart1->renderHtml() !!} --}}
                    <canvas id="chart2"></canvas>
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
                              <a class="link  text-xs font-weight-bold text-primary text-uppercase mb-1" href="{{ route('surat-masuk') }}">
                                  Jumlah Surat Masuk</a>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $surat_masuk }}
                                  </div>
                              </div>
                              <div class="col-auto card-image">
                              <img src="{{ asset('assets/icon/mail_icon.png') }}">
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
                                <a class="link text-xs font-weight-bold text-danger text-uppercase mb-1" href="{{ route('surat-keluar') }}">
                                    Jumlah Surat Keluar</a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      {{ $surat_keluar }}
                                    </div>
                              </div>
                                <div class="col-auto card-image">
                                    <img src="{{ asset('assets/icon/send_icon.png') }}">
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  @section('scripts')
                  {{-- {!! $chart1->renderChartJsLibrary() !!}
                  {!! $chart1->renderJs() !!} --}}
                  @endsection

                  @push('js')
                  <script>
                    const label_sm = {{ Js::from($sm->keys()) }}
                    const label_sk = {{ Js::from($sk->keys()) }}
                    
                    const sm = {{ Js::from($sm->values()) }}
                    const sk = {{ Js::from($sk->values()) }}
                    
                    const data_sm = {
                      labels: label_sm,
                      datasets: [{
                        label: 'Surat Masuk',
                        backgroundColor: 'rgb(0, 99, 132)',
                        borderColor:  'rgb(0, 99, 132)',
                        data: sm,
                      }]
                    };
                    const data_sk = {
                      labels: label_sk,
                      datasets: [{
                        label: 'Surat Keluar',
                        backgroundColor: 'rgb(255, 0, 0)',
                        borderColor: 'rgb(255, 0, 0)',
                        data: sk,
                      }]
                    };
                    
                    const config_sm = {
                      type: 'bar',
                      data: data_sm,
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    };
                    const config_sk = {
                      type: 'bar',
                      data: data_sk,
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    };
                
                  const myChart = new Chart(
                    document.getElementById('myChart'),
                    config_sm
                  );
                
                  const myChart2 = new Chart(
                    document.getElementById('chart2'),
                    config_sk
                  );
                </script>
                @endpush
</x-app-layout>