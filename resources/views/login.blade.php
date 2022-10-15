<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .card{
                margin-top: 20vh;
            }
        </style>
    </head>
    <body class="bg-dark-login">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header text-center"><img class="mt-4" src="{{ asset('img/logo.png') }}" alt="logo" width="80px"><h3 class="text-center font-weight-light mt-2">Login - RW 02 Tlogomas</h3></div>
                                    <div class="card-body">
                                        <form action="/" method="POST">
                                            @csrf
                                            @if (session()->has('loginError'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ session('loginError') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            
                                                
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" placeholder="user@gmail.com" name="email" autofocus required value="{{ old('email') }}" @error('email') is-invalid
                                                     @enderror/>
                                                <label for="email">Alamat Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" placeholder="Password" name="password" />
                                                <label for="password">Kata Sandi</label>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Login</button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
