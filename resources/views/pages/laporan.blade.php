<x-app-layout>
    <div class="row">
        <div class="col mt-4">
            <h3 class="fw-semibold text-black">Laporan Surat</h3>
        </div>
    </div>
        <!-- form filter -->
    <form class="py-2" action="{{ route('laporan') }}" class="form">
        <div class="row">
            <div class="col-3">
                <label class="form-label" for="jenis">Jenis Surat :</label>
                <select class="form-select" name="jenis" id="jenis">
                    <option value="1">Surat Masuk</option>
                    <option value="2">Surat Keluar</option>
                </select>
            </div>
            <div class="col-3">
                <label class="form-label" for="dari_tanggal">Dari Tanggal :</label>
                <input class="form-control" type="date" name="dari_tanggal" id="dari_tanggal" value="{{ request('dari_tanggal') }}" required>
            </div>  
            <div class="col-3">
                <label class="form-label" for="sampai_tanggal">Sampai Tanggal :</label>
                <input class="form-control" type="date" name="sampai_tanggal" id="sampai_tanggal" value="{{ request('sampai_tanggal') }}" required>
            </div>
            <div class="col-3 p-2">
                <button class="btn btn-primary mt-4" type="submit" name="cari">Cari</button>     
            </div>
        </div>
    </form>
        
    <div class="card shadow my-2">
        <div class="card-header">
            <div class="row">
                <h6>Data Surat</h6>
            </div>
        </div>
        <div class="card-body p-1 m-0 table table-responsive">
            <table class="table display nowrap w-100" border="5" cellpadding="10" cellspacing="0">
                @if ($surats->isEmpty())
                    <div class="col-sm alert alert-danger" role="alert">
                        Data tidak ditemukan
                    </div>
                @else
                    @foreach ($surats as $s)
                        @switch($s->category_id)
                            @case(1)
                                <div class="card">
                                    <div class="card-body">
                                        <p>{{ $loop->iteration }}</p>
                                        <p>Tanggal Surat Masuk : {{ date("d-m-Y" , strtotime($s->tanggal)) }}</p>
                                        <p>Nomor surat : {{ $s->nomor_surat }}</p>
                                        <p>Asal : {{ $s->asal_surat }}</p>
                                        <p>Nomor & Tanggal Surat : {{ $s->nomor_tanggal_surat }}</p>
                                        <p>Perihal : {{ $s->perihal }}</p>
                                    </div>
                                </div>
                                @break
                            @case(2)
                                <div class="card">
                                    <div class="card-body">
                                    <p>{{ $loop->iteration }}</p> 
                                    <p>Tanggal Surat Keluar : {{ date("d-m-Y" , strtotime($s->tanggal)) }}</p>
                                    <p>Nomor Surat : {{ $s->nomor_surat }}</p>
                                    <p>Kepada : {{ $s->kepada }}</p>
                                    <p>Keperluan : {{ $s->keperluan }}</p>
                                    </div>
                                </div>  
                                @break
                        @endswitch
                    @endforeach                
                @endif
                
            </table>
            {{ $surats->links() }}
        </div>
    </div>
</x-app-layout>

