<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{ asset('css/bootstraps-5.min.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="d-flex flex-row justify-content-center gap-3 vh-100">
        <div class="w-75 d-flex justify-content-center align-items-center bg-primary">
            <img class="w-100 object-fit-contain" src="{{ asset('img/login-page.jpg') }}" alt="">
        </div>
        <div class="w-25 d-flex justify-content-center align-items-center flex-column">

            <form method="POST" action="{{ route('auth.login') }}" class="w-75">
                <h2>Sign In</h2>
                <p class="text-secondary">Comprehensive choices for every accommodation: hotels, villas, apartments, and
                    hostels.</p>
                @csrf
                @method('POST')
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i data-feather="mail"></i></span>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid" @enderror id="email" placeholder="Email"
                            aria-describedby="emailHelp">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i data-feather="key"></i></span>
                        <input type="password" name="password"
                            class="form-control  @error('password') is-invalid @enderror" id="password"
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="py-2">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col text-end">
                            <a class="text-decoration-none" href="#">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="cus btn cus btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
