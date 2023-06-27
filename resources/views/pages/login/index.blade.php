<!DOCTYPE html>
<html style="width:100%;" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<!-- <link rel="stylesheet" href="../styles/sidebar.css"> -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- <link rel="stylesheet" href="styles/admin.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="shortcut icon" href="assets/img/logo_siapwolu.png">
</head>
<style>
.text-primary{
color: #27447F !important;
}
.btn-danger:hover{
background-color: white;
color: red;
border: solid 1px red;
}
.bg-ft {
background-color: #1a3161;
color: white;
}
</style>
<body>
<div class="container-fluid">
    <div class="row min-vh-100">
        <div class="d-flex justify-content-center align-items-center col-lg-6 col-sm-4">
            <img class="w-75" src="assets/img/login.png" alt="login">   
        </div>
        <div class="d-flex justify-content-center align-items-center col-lg-6 col-sm-4 bg-primary">
            <div class="card border-0 rounded-3 w-50">
                <form class="h-75"  action="{{ route('auth') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="card-body">
                        <ul class="text-primary p-0">
                            <h1 class="card-title fw-bolder" style="font-size: 50px;">Login</h1>
                            <p class="fw-bold">Masukan Username dan Password</p>
                            <li class="fw-bold">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control bg-input" autocomplete="none" type="text" name="username" id="username">
                            </li>
                            <li class="fw-bold">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control bg-input" autocomplete="false" type="password" name="password" id="password">
                            </li> 
                            
                            <li class="p-0 fw-semibold">
                                <input class="d-inline" type="checkbox" name="remember" id="remember">
                                <label class="form-label" for="remember">Remember me</label>
                            </li>
                            
                            @if (session()->has('failed'))
                                <p class="text-danger fst-italic fw-semibold">
                                    {{ session('failed') }}
                                </p>
                            @endif
                            <button class="float-end my-3 btn btn-danger px-4" type="submit" name="submit">
                                Login
                            </button>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="row d-flex justify-content-center align-items-center bg-ft fixed-bottom">
        <p class="text-muted text-center m-2 ">2022 &#169;	SIAPWOLU</p>
    </div>
</div>
<script src="assets/js/script.js"></script>
<!-- script popper js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
        AOS.init();
</script>
</body>
</html>