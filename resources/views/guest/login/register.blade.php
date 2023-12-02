@extends('guest.login.layout.loginRegisLayout')

@section('form-container')
    <h1 class="text-center mt-2" style="font-weight: 700">REGISTER</h1>
    <form action="/register" method="POST">
        @csrf
        <div class="container p-3">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name"
                    placeholder="name" value="{{ old('name') }}" autofocus required>
                <label for="floatingInput">Name</label>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror"
                    id="username" placeholder="username" value="{{ old('username') }}" autofocus required>
                <label for="floatingInput">Username</label>
                @error('username')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email"
                    placeholder="email" value="{{ old('email') }}" autofocus required>
                <label for="floatingInput">Email </label>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="country" class="form-label ps-1">Country</label>
                <select class="form-select" name="country">
                    {{-- @if (old('category_id') == $category->id) --}}
                        <option value="indonesia" selected>Indonesia</option>
                    {{-- @else --}}
                        <option value="other">Other</option>
                    {{-- @endif --}}
                </select>
                @error('country')
                    {{ $message }}
                @enderror
            </div>
            <small class="d-block mt-1 mb-3 text-black-50">Have Account? <a href="/login"
                    class="text-black">Login</a></small>
            <div class="container d-flex justify-content-center" style="width: 100%">
                <button class="btn text-center" style="background-color: rgb(167, 169, 176)"
                    type="submit">Register</button>
            </div>
        </div>
    </form>
@endsection
