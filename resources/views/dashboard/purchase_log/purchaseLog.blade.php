@extends('dashboard.layout.dashboardLayout')

@section('content')
    <h3 class="text-center mt-5 mb-5">Purchase Log</h3>
    <div class="row justify-content-center align-items-start" style="height: 100%">
        @if ($logs->count() >= 1)
            <div class="col-lg-8">
                <table class="table table-striped text-center mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Purchased At</th>
                            @can('admin')
                            <th scope="col" class="text-center">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="text-start">{{ $log->user->name }}</td>
                                <td>{{ $log->title }}</td>
                                <td>{{ $log->price }}</td>
                                <td>{{ $log->amount }}</td>
                                <td>{{ $log->total }}</td>
                                <td>{{ $log->payment }}</td>
                                <td>{{ $log->created_at }}</td>
                                @can('admin')
                                <td><a class="badge btn btn-success" href="/dashboard/logAdmin/edit?id={{ $log->id }}">Mark As Complete</a></td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $logs->links() }}
            </div>
        @else
        <h5 class="text-center">Log Empty</h5>
        @endif
    </div>
@endsection
