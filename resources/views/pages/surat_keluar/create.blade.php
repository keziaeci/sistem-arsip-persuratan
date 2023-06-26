<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Tambah surat keluar</h4>
                </div>
                <form class="card-body m-0" action="{{ route('sk-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="tanggal">Tanggal Pembuatan </label>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" size="" required>
                                </li>
                                <li>
                                    <label class="form-label" for="nomor_surat">Nomor Surat </label>
                                    <input class="form-control" type="text" name="nomor_surat" id="nomor_surat" size="" required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="kepada">Kepada</label>
                                    <input class="form-control" type="text" name="kepada" id="kepada" required>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="keperluan">Keperluan</label>
                                    <input class="form-control" type="text" name="keperluan" id="keperluan" required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="file">File </label>
                                    <input class="form-control" type="file" name="file" id="file">
                                </li>
    
                                <li>
                                    <label class="form-label" for="laporan">Laporan</label>
                                    <input class="form-control" type="file" name="laporan" id="laporan">
                                </li>
    
                                <input type="hidden" name="category_id" id="category" value="2">
                                <br>
                            </ul>
                        </div>
                        <ul class="m-2 list-unstyled">
                            <div class="row m-2">
                                <div class="col">
                                    <a class=" material-symbols-outlined text-decoration-none" href="{{ route('surat-keluar') }}">
                                        <i class="fi fi-br-angle-left"></i>
                                    </a>
                                </div>
                                
                                <div class="col">
                                    <li>
                                        <button class="btn bg-primary text-light float-right" type="submit" name="submit" 
                                        {{-- onclick="return confirm('Data yang dikirim tidak dapat diubah ,pastikan data sudah benar!')" --}}
                                        >Tambah Data </button>
                                    </li>
                                </div>
                            </div>
                            <!-- <a class="btn btn-outline-primary" href="index.php">Kembali</a> -->
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>