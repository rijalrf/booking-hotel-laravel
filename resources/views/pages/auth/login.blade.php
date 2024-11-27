<x-layout-base>
    <div class="d-flex flex-row justify-content-center gap-3 vh-100">
        <div class="w-75 d-flex justify-content-center align-items-center bg-white">
            <img class="w-75 object-fit-contain" src="{{ asset('img/login-banner.jpg') }}" alt="">
        </div>
        <div class="w-25 d-flex justify-content-center align-items-center flex-column">

            <form method="POST" action="{{ route('auth.login') }}" class="w-75">
                <div class="mb-3"><img src="{{ asset('img/Logo1.png') }}" width="75" class="rounded"
                        alt="appLogo"></div>
                <h2>Sign In</h2>
                <p class="text-secondary">Login to management booking, apartments, and
                    hostels.</p>
                @csrf
                @method('POST')
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="addon-wrapping"><i style="width: 18px"
                                data-feather="mail"></i></span>
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
                        <span class="input-group-text" id="addon-wrapping"><i style="width: 18px"
                                data-feather="key"></i></span>
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
                            <input type="checkbox" name="isremenber" id="rememberme"> <span>Remember Me</span>
                        </div>
                        <div class="col text-end">

                            <a class="text-decoration-none" href="#">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-base>
