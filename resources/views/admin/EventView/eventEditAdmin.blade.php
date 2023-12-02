@extends('dashboard.layout.dashboardLayout')
@inject('Carbon', 'Carbon\Carbon')

@section('content')
    <h1 class="h2 text-center mt-4 mb-4">Create New Event</h1>

    <div class="row justify-content-center text-dark">
        <div class="col-lg-6">
            <form method="POST" action="/dashboard/event/{{ $event->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                        class="form-control @error('title')
                        is-invalid
                    @enderror"
                        id="title" name="title" value="{{ $event->title }}" required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="organizer" class="form-label">Organizer</label>
                    <input type="text"
                        class="form-control @error('organizer')
                        is-invalid
                    @enderror"
                        id="organizer" name="organizer" value="{{ $event->organizer }}" required>
                    @error('organizer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text"
                        class="form-control @error('location')
                        is-invalid
                    @enderror"
                        id="location" name="location" value="{{ $event->location }}" required>
                    @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label">Start</label>
                    <input type="datetime-local"
                        class="form-control @error('start')
                        is-invalid
                    @enderror"
                        id="start" name="start" value="{{ $Carbon::parse($event->start)->format('Y-m-d\TH:i') }}"
                        required>
                    {{-- @dd($Carbon::parse($event->start)->format('Y-m-d\TH:i:sP')) --}}

                    @error('start')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="end" class="form-label">End</label>
                    <input type="datetime-local"
                        class="form-control @error('end')
                        is-invalid
                    @enderror"
                        id="end" name="end" value="{{ $Carbon::parse($event->end)->format('Y-m-d\TH:i') }}"
                        required value="{{ $event->end }}">
                    @error('end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc_EN" class="form-label">Event Description English</label>
                    @error('desc_EN')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <textarea class="form-control" id="desc_EN" rows="5" name="desc_EN" required>{{ $event->desc_EN }}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="desc_ID" class="form-label">Event Description Indonesia</label>
                    @error('desc_ID')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <textarea class="form-control" id="desc_ID" rows="5" name="desc_ID" required>{{ $event->desc_ID }}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image"
                        class="form-label @error('image')
                    is-invalid
                    @enderror">Upload
                        Image</label>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if ($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" class="img-preview img-fluid mb-3">
                    @else
                        <img class="img-preview img-fluid mb-3">
                    @endif
                    <input class="form-control" name="image" type="file" id="image" accept=".png"
                        onchange="previewImage()">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="use_ticket" id="flexRadioDefault2" value="false"
                        onclick="ticketSet2()" @if (!$event->use_ticket) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                        No Ticket
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="use_ticket" id="flexRadioDefault1" value="true"
                        onclick="ticketSet()" @if ($event->use_ticket) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Use Ticket
                    </label>
                </div>
                @error('ticket')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                @if ($event->use_ticket)
                    <div id="ticket-set" style=" @if (!$event->use_ticket) display: none @endif">
                        <div class="mb-3 mt-3">
                            <label for="slot" class="form-label">Slot</label>
                            <input type="number" class="form-control @error('slot')is-invalid @enderror" id="slot"
                                name="slot"
                                value="{{ $event->ticket->slot }}"
                                min="1">
                            @error('slot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error('price')is-invalid @enderror"
                                id="price" name="price" value="{{ $event->ticket->price }}" min="1">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                    <div id="ticket-set" style="display: none">
                        <div class="mb-3 mt-3">
                            <label for="slot" class="form-label">Slot</label>
                            <input type="number" class="form-control @error('slot')is-invalid @enderror" id="slot"
                                name="slot" value="{{ old('slot') }}" min="1">
                            @error('slot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error('price')is-invalid @enderror"
                                id="price" name="price" value="{{ old('price') }}" min="1">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @endif

                <center>
                    <button type="submit" class="btn btn-warning mt-4">Edit</button>
                </center>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPrev = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPrev.src = oFREvent.target.result;
            }
        }

        function ticketSet() {
            const ticketSel = document.getElementById('ticket-set');

            ticketSel.style.display = 'block';
        }

        function ticketSet2() {
            const ticketSel = document.getElementById('ticket-set');

            ticketSel.style.display = 'none';
        }
    </script>
@endsection
