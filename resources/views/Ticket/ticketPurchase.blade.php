@extends('guest.layout.mainLayout')

@section('main-content')
    <h1 class="h2 text-center mt-4 mb-4">Purchase Ticket</h1>

    <div class="row justify-content-center text-black-50">

        <div class="col-lg-4 mb-4">
            <h5>Title: {{ $ticket->event->title }}</h5>
            <h5>Slot: {{ $ticket->slot }}</h5>
            <h5 id="price">Price: {{ $ticket->price }}</h5>
        </div>
    </div>
    <div class="row justify-content-center text-black-50">
        <div class="col-lg-4">
            <form method="POST" action="/dashboard/categories">
                @csrf
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number"
                        class="form-control @error('amount')
                        is-invalid
                    @enderror"
                        id="amount" name="amount" value="{{ old('amount') }}" min="1" max="{{ $ticket->slot }}" onkeyup="myFunction()">
                    @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <h5 class="mt-3" id="total">Total: </h5>
                    <center>
                        <button type="submit" class="btn btn-secondary mt-4">Purchase</button>
                    </center>
                </div>
            </form>
        </div>
    </div>

    <script>
        function myFunction() {
            const priceInt = {{ $ticket->price }};
            var amount = document.getElementById("amount").value;
            const total = document.getElementById("total");

            if(amount > {{ $ticket->slot }}){
                document.getElementById("amount").value = {{ $ticket->slot }};

            }
            total.innerHTML = "Total: " +  priceInt*amount;
        }
    </script>
@endsection
