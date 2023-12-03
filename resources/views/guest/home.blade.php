@extends('guest.layout.mainLayout')
@inject('Carbon', 'Carbon\Carbon')

@section('main-content')
    <center>
        @if (isset(auth()->user()->country) && auth()->user()->country == 'indonesia')
        <h1 class="my-4">SELAMAT DATANG</h1>
        @else
        <h1 class="my-4">WELCOME</h1>
        @endif
        <div class="container text-light row align-items-center border" style="height: 100%;">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <a href="event?detail={{ $events[0]->id }}">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid"
                                src="@if ($events[0]->image) {{ asset('storage/' . $events[0]->image) }}
                            @else
                            {{ asset('storage/no-img.jpg') }} @endif"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.75)">
                                <h5>{{ $events[0]->title }}</h5>
                                <p>{{ $Carbon::parse($events[0]->start)->format('l, j F Y') }}</p>
                            </div>
                        </div>
                </a>
                @foreach ($events->skip(1) as $event)
                    <a href="event?detail={{ $event->id }}">
                        <div class="carousel-item">
                            <img class="img-fluid"
                                src="@if ($event->image) {{ asset('storage/' . $event->image) }}
                            @else
                            {{ asset('storage/no-img.jpg') }} @endif"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.75)">
                                <h5>{{ $event->title }}</h5>
                                <p>{{ $Carbon::parse($event->start)->format('l, j F Y') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
    </center>
@endsection
