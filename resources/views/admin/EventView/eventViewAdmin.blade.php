@extends('dashboard.layout.dashboardLayout')

@section('content')
    <h1 class="h2 text-center mt-4 mb-4">Event</h1>


    <div class="container col-lg-7">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive small">
            <a href="/dashboard/event/create" class="btn btn-success mb-4">New Event</a>
            <table class="table table-striped table-sm col-lg-8 justify-content-center table-secondary">
                <thead>
                    <tr class="text-startr">
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="text-center">Ticket</th>
                        <th scope="col" colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->title }}</td>
                            <td class="text-center">{{ ($event->use_ticket) ? 'TRUE' : 'FALSE' }}</td>
                            <td class="text-center">
                                <a class="badge bg-primary" href="/event?detail={{ $event->id }}"><i
                                        class="bi bi-eye-fill"></i></a>
                                <a class="badge bg-warning" href="/dashboard/event/{{ $event->id }}/edit"><i
                                        class="bi bi-pen-fill"></i></a>
                                <form action="/dashboard/event/{{ $event->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Do You Want to delete?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
