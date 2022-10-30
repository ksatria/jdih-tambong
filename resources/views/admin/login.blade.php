<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login | JDIH Desa Tambong</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/sign-in.css') }}">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{ route('admin.login.proses') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login Admin</h1>

            @error('login')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="text" name="usernamejdih" class="form-control" id="floatingInput"
                    placeholder="Masukkan username" value="{{ old('usernamejdih') }}">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="password" name="passwordjdih" class="form-control" id="floatingPassword"
                    placeholder="Masukkan password" value="{{ old('passwordjdih') }}">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="rememberjdih" {{ old('rememberjdih') ? 'checked' : '' }}> Ingat saya
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">JDIH Desa Tambong &copy; 2022</p>
        </form>
    </main>
</body>

</html>
