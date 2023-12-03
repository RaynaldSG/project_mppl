@extends('dashboard.layout.dashboardLayout')

@section('content')
    <div class="row text-center text-black align-items-center justify-content-center p-0 m-0" style="height: 100vh;">
        @if (auth()->user()->country == 'indonesia')
        <h1>SELAMAT DATANG</h1>
        @else
        <h1>WELCOME</h1>
        @endif
    </div>
@endsection
