<x-app-layout>
    <div class="row">
        <div class="col mt-4">
        <h3 class="fw-semibold text-black">Daftar Surat Keluar</h3>               
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header">
            <div class="row">
                @can('create')
                <a  class="col-sm-2 btn text-light bg-primary" href="{{ route('sk-create') }}"><b>+</b>   Tambah Surat</a>
                @endcan
                <form class="col-sm-4 d-flex" action="{{ route('surat-keluar') }}">
                @csrf
                    <input class="form-control me-2 " type="text" name="search" autofocus placeholder="cari" autocomplete="off" size="30" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit" >Cari</button>
                </form>
            </div>
        </div>
        <div class="card-body p-1 m-0 table-responsive">
            <table class="table table-bordered display w-100" border="5" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No. Urut</th> 
                    <th>Tanggal Pembuatan</th>
                    <th>Nomor Surat</th>
                    <th>Kepada</th>
                    <th>Keperluan</th>
                    <th>File  </th>
                    @can(['delete', 'update'])
                    <th>Aksi</th>
                    @endcan
                    <th>Laporan</th>
                </tr>
                @if (empty($surats))
                    <tr>
                        hshh    
                    </tr>
                @else
                    @foreach ($surats as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d/m/Y' , strtotime($surat->tanggal)) }}</td>
                            <td>{{$surat->nomor_surat}}</td>
                            <td>{{$surat->kepada}}</td>
                            <td>{{$surat->keperluan}}</td>
                            <td> <a href="" class="btn btn-success">Preview</a> </td>
                            @can(['delete','update'])
                            <td>
                                <form action="{{ route('sk-delete', $surat->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                                <a href="{{ route('sk-edit' , $surat->id) }}" class="btn btn-warning" type="submit">Ubah</a>
                            </td>
                            @endcan
                            @if (empty($surat->laporan))
                            <td>Tidak ada</td>
                            @else
                            <td> <a href="" class="btn btn-success">Preview</a> </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                
                    
            </table>
        </div>
    </div>
</x-app-layout>