<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <link href="{{ asset('template/images/laravel.ico') }}" rel="SHORTCUT ICON"/>   <!-- ICON -->

    <link
    rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet"/>
    <style>
        body {
        font-family: "Roboto Condensed", sans-serif;
        background-color: #dedede;
        }
    </style>

    <title>Form Login</title>
</head>


<body>

<div class="container rounded shadow-lg px-4 py-5 mt-5 bg-white" style="max-width: 420px">
    <h1 class="text-center mb-4">Login</h1>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
            <label>{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <label>{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div style="display: flex; justify-content: flex-end">
            Belum punya akun,&nbsp;<a href="{{ route('register') }}">Register Sekarang!</a>
        </div>

        <button type="submit" class="btn btn-primary w-75 btn-block mx-auto mt-3">
            {{ __('Login') }}
        </button>
    </form>
</div>


</body>
</html>