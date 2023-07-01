<x-app-layout>
    <div>
        <h3 class="fw-semibold text-black">User Profile</h3>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible  show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <form class="card-body">
                <ul class="list-unstyled">
                    <li>
                        <label class="form-label" for="">Username</label>
                        <input class="form-control" type="text" name="" id="" value="{{ $user->username }}" readonly>
                    </li>
                    <li>
                        <label class="form-label" for="">Akun dibuat pada</label>
                        <input class="form-control" type="date" name="" id="" value="{{ date('Y-m-d' , strtotime($user->created_at));  }}" readonly>
                    </li>
                </ul>
                
                <a href="{{ route('profile-edit') }}" class="btn btn-danger" >Ubah Password</a>
        </form>
    </div>
</x-app-layout>
