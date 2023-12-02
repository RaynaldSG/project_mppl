@extends('guest.layout.mainLayout')
@inject('Carbon', 'Carbon\Carbon')

@section('main-content')
    <div class="container text-black mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">{{ $event->title }}</h2>
                <h5 class="text-center mb-5">{{ $Carbon::parse($event->start)->format('l, j F Y') }}</h5>
                <img class="mb-4 img-fluid"
                    src="@if ($event->image) {{ asset('storage/' . $event->image) }}
            @else
                    {{ asset('storage/no-img.jpg') }} @endif">
                <h4 class="text-black-50">Lokasi: {{ $event->location }}</h4>
                <h4 class="text-black-50 mb-5">Penyelenggara: {{ $event->organizer }}</h4>
                <textarea class="text-black border mb-3" name="" id="" cols="30" rows="10" disabled
                    style="width: 100%; background-color: rgba(0, 0, 0, 0); border: 0;">{{ $event->desc_EN }}</textarea>
                @if ($event->ticket)
                <center>
                    <a class="btn btn-secondary mb-5" href="ticket?event={{ $event->id }}">
                        Beli Tiket
                    </a>
                </center>
                @endif
            </div>
        </div>
    </div>
@endsection
