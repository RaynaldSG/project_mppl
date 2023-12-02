@extends('guest.login.layout.loginRegisLayout')

@section('form-container')
    <h1 class="text-center mt-2" style="font-weight: 700">LOGIN</h1>
    @if (session()->has('login_error'))
        <p class="card text-center mx-5 mt-3 mb-1" style="font-weight: 700; background-color:rgba(255, 0, 0, 0.6)">{{ session('login_error') }}</p>
    @endif
    @if (session()->has('register_success'))
        <p class="card text-center mx-5 mt-3 mb-1" style="font-weight: 700; background-color:rgba(17, 255, 0, 0.6)">{{ session('register_success') }}</p>
    @endif
    <form action="/login" method="POST">
        @csrf
        <div class="container p-3 text-light">
            <div class="form-floating mb-4 text-dark">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username"
                    placeholder="username" value="{{ old('username') }}" autofocus required>
                <label for="floatingInput">Username</label>
                @error('username')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-0 text-dark">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <small class="d-block mt-1 mb-3 text-black-50">Doesn't Have Account? <a href="/register" class="text-black">Register</a></small>
            <div class="container d-flex justify-content-center" style="width: 100%">
                <button class="btn text-center" style="background-color: rgb(167, 169, 176)" type="submit">Login</button>
            </div>
        </div>


    </form>
@endsection
