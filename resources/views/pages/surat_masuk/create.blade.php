<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Tambah surat masuk</h4>
                </div>
                <form class="card-body m-0" action="{{ route('sm-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="tanggal">Tanggal Terima </label>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" size="" required>
                                </li>
                                <li>
                                    <label class="form-label" for="nomor_surat">Nomor Surat </label>
                                    <input class="form-control" type="text" name="nomor_surat" id="nomor_surat" size="" required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="asal_surat">Asal Surat</label>
                                    <input class="form-control" type="text" name="asal_surat" id="asal_surat" required>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="m-2 p-0 list-unstyled">
                                <li>
                                    <label class="form-label" for="nomor_tanggal_surat">Nomor & Tanggal Surat </label>
                                    <input class="form-control" type="text" name="nomor_tanggal_surat" id="nomor_tanggal_surat" placeholder=".../.../..." required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="perihal">Perihal </label>
                                    <input class="form-control" type="text" name="perihal" id="perihal" required>
                                </li>
        
                                <li>
                                    <label class="form-label" for="file">File </label>
                                    <input class="form-control" type="file" name="file" id="file" required>
                                </li>
                                <li>
                                    <label class="form-label" for="disposisi">Disposisi</label>
                                    <input class="form-control" type="file" name="disposisi" id="disposisi">
                                </li>
    
                                <input type="hidden" name="category_id" id="category" value="1">
                                <br>
                            </ul>
                        </div>
                        <ul class="m-2 list-unstyled">
                            <li>
                                <button class="btn bg-primary text-light" type="submit" name="submit" 
                                {{-- onclick="return confirm('Data yang dikirim tidak dapat diubah ,pastikan data sudah benar!')" --}}
                                >Tambah Data </button>
                            </li>
                            <br>
                            <a class=" material-symbols-outlined text-decoration-none" href="{{ route('surat-masuk') }}">arrow_back_ios</a>
                            <!-- <a class="btn btn-outline-primary" href="index.php">Kembali</a> -->
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>