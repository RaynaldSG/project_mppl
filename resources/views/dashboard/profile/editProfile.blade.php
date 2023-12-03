@extends('dashboard.layout.dashboardLayout')

@section('content')
    <h1 class="text-center mt-4 mb-4">Profile</h1>
    <div class="row justify-content-center text-dark p-0 m-0">
        <div class="col-lg-6">
            @if (session()->has('success'))
                <p class="card text-center mx-5 mt-3 mb-1" style="font-weight: 700; background-color:rgba(17, 255, 0, 0.6)">
                    {{ session('success') }}
                </p>
            @endif
            <form action="/dashboard/profile" method="POST">
                @csrf
                <div class="container p-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                            id="name" placeholder="name" value="{{ $user->name }}" autofocus required>
                        <label for="floatingInput">Name</label>
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror"
                            id="username" placeholder="username" value="{{ $user->username }}" autofocus required>
                        <label for="floatingInput">Username</label>
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror"
                            id="email" placeholder="email" value="{{ $user->email }}" autofocus required>
                        <label for="floatingInput">Email </label>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label ps-1">Country</label>
                        <select class="form-select" name="country">
                            <option value="indonesia" @if ($user->country == 'indonesia') selected @endif>Indonesia</option>
                            <option value="other" @if ($user->country != 'indonesia') selected @endif>Other</option>
                        </select>
                        @error('country')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="container d-flex justify-content-center" style="width: 100%">
                        <button class="btn text-center" style="background-color: rgb(167, 169, 176)"
                            type="submit">Edit</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
@endsection
