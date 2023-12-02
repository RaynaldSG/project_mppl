@extends('guest.layout.mainLayout')
@inject('Carbon', 'Carbon\Carbon')

@section('main-content')
    <h1 class="text-center text-black mt-4 mb-5">Event</h1>

    @foreach ($events as $event)
        <div class="card mb-3 text-light" style="background-color: rgba(255, 255, 223, 0.76)">
            <img src=" @if ($event->image) {{ asset('storage/' . $event->image) }}
        @else
            https://source.unsplash.com/1200x400 @endif "
                class="card-img-top" alt="">
            <div class="card-body">
                <h3 class="card-title text-center text-black">{{ $event->title }}</h3>
                <p class="text-light">
                    {{-- <a class="text-decoration-none" href='/article?author=' style="color: rgb(147, 148, 150)">
                    <h4>Penyelenggara :
                </a> --}}
                <h4 style="color: rgb(147, 148, 150">Lokasi : {{ $event->location }} </h4>
                <h4 style="color: rgb(147, 148, 150">Tanggal : {{ $Carbon::parse($event->start)->format('l, j F Y') }} </h4>
                <h4 style="color: rgb(147, 148, 150">Penyelenggara : {{ $event->organizer }}</h4>
                </p>
                <small>
                    <p class="card-text text-black">{{ Str::limit($event->desc_EN, 50, '...') }}</p>
                </small>
                <a class="text-decoration-none btn btn-secondary my-3" href="/event?detail={{ $event->id }}">Read More</a>
                <small>
                    <p class="card-text text-black-50"><small>uploaded at: {{ $event->created_at->diffForHumans() }}</small></p>
                </small>
            </div>
        </div>
    @endforeach

    {{-- {{ $articles->links() }} --}}
@endsection
