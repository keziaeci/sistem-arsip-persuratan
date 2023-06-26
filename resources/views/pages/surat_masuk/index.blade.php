<x-app-layout>
    <div class="row">
        <div class="col mt-4">
            <h3 class="fw-semibold text-black">Daftar Surat Masuk</h3>               
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header">
            <div class="row">
                @can('create')
                <a  class="col-sm-2 btn text-light bg-primary" href="{{ route('sm-create') }}"><b>+</b>   Tambah Surat</a>
                @endcan
            {{-- search form --}}
            <form class="col-sm-4 d-flex" action="{{ route('surat-masuk') }}">
                @csrf
                <input class="form-control me-2 " type="text" name="search" autofocus placeholder="cari" autocomplete="off" size="30" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit" >Cari</button>
            </form>
            </div>
        </div>
        <div class="card-body p-1 m-0">
            {{-- table --}}
            <div class=" table-responsive">
                <table class="table table-bordered display w-100" border="5" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No. Urut</th> 
                        <th>Tanggal</th>
                        <th>Nomor Surat</th>
                        <th>Asal Surat</th>
                        <th>Nomor & Tanggal Surat</th>
                        <th>Perihal </th>
                        <th>File  </th>
                        @can('delete')
                        <th>Aksi</th>
                        @endcan
                        <th>Disposisi</th>
                    </tr>
                    
                @foreach ($surats as $surat)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d/m/Y' , strtotime($surat->tanggal)) }}</td>
                    <td>{{$surat->nomor_surat}}</td>
                    <td>{{$surat->asal_surat}}</td>
                    <td>{{$surat->nomor_tanggal_surat}}</td>
                    <td>{{$surat->perihal}}</td>
                    <td> <a href="{{ route('preview' , $surat->id) }}" class="btn btn-success">Preview</a> </td>
                    @can('delete')
                    <td>
                        <form action="{{ route('sm-delete', $surat->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                    </td>
                    @endcan
                    @if (empty($surat->disposisi))
                        <td>Tidak ada</td>
                        @else
                        <td><a href="{{ route('disposisi' , $surat->id) }}" class="btn btn-success">Preview</a></td>
                    @endif
                    </tr>
                @endforeach
                    
                </table>
            </div>
            {{ $surats->links() }}
        </div>
    </div>    
</x-app-layout>
