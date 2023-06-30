<x-app-layout>
    <div>
        <h3 class="fw-semibold text-black">Edit Profile</h3>
    </div>
    <div class="card">
        <form class="card-body" action="{{ route('profile-update', Auth::user()->id) }}" method="POST">
            @csrf
            @method('patch')
                <ul class="list-unstyled">
                    <li>
                        <label class="form-label" for="">Masukkan Password Lama</label>
                        <input class="form-control" type="text" name="old-pw" id="">
                    </li>
                    @error('old-pw') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror   
                    <li>
                        <label class="form-label" for="">Masukkan Password Baru</label>
                        <input class="form-control" type="text" name="new-pw" id="">
                    </li>
                    @error('new-pw') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <li>
                        <label class="form-label" for="">Konfirmasi Password Baru</label>
                        <input class="form-control" type="text" name="confirm-pw" id="">
                    </li>

                    @error('confirm-pw') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </ul>
                
                <a href="{{ url()->previous() }}" class="btn btn-secondary" >Batal</a>
                <button type="submit" class="btn btn-danger" >Simpan</button>
        </form>
    </div>
</x-app-layout>
