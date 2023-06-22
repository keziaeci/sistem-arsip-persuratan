<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Ubah surat keluar</h4>
                </div>
                <form class="card-body m-0" action="{{ route('sk-update', $surat->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="tanggal">Tanggal Pembuatan </label>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{  date('Y-m-d', strtotime($surat->tanggal)) }}" required>
                                </li>
                                <li>
                                    <label class="form-label" for="nomor_surat">Nomor Surat </label>
                                    <input class="form-control" type="text" name="nomor_surat" id="nomor_surat" value="{{ $surat->nomor_surat }}" readonly>
                                </li>
                                <li>
                                    <label class="form-label" for="kepada">Kepada</label>
                                    <input class="form-control" type="text" name="kepada" id="kepada" value="{{ $surat->kepada }}" required>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="keperluan">Keperluan</label>
                                    <input class="form-control" type="text" name="keperluan" id="keperluan" value="{{ $surat->keperluan }}" required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="file">File </label>
                                    <input class="form-control" type="file" name="file" id="file" value="{{ $surat->file }}">
                                </li>
                                <li>
                                    <label class="form-label" for="laporan">Laporan</label>
                                    <input class="form-control" type="file" name="laporan" value="{{ $surat->laporane }}" id="laporan">
                                </li>
    
                                <input type="hidden" name="category_id" id="category" value="2">
                                <br>
                            </ul>
                        </div>
                        <ul class="m-2 list-unstyled">
                            <li>
                                <button class="btn bg-primary text-light" type="submit"
                                {{-- onclick="return confirm('Data yang dikirim tidak dapat diubah ,pastikan data sudah benar!')" --}}
                                >Ubah Data </button>
                            </li>
                            <br>
                            <a class=" material-symbols-outlined text-decoration-none" href="{{ route('surat-keluar') }}">arrow_back_ios</a>
                            <!-- <a class="btn btn-outline-primary" href="index.php">Kembali</a> -->
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>