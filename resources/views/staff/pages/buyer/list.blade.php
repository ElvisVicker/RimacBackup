@extends('staff/layout/master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-6">
            <div class="col-sm-12 col-xl-12">

                <div class="bg-secondary rounded h-100 p-4">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-4 ">Buyer List</h6>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>

                                <th scope="col">Car ID</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Type</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($buyers as $buyer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buyer->id }}</td>
                                    <td>{{ $buyer->first_name }}</td>
                                    <td>{{ $buyer->last_name }}</td>

                                    <td>{{ $buyer->car_id }}</td>
                                    <td>{{ $buyer->car_name }}</td>
                                    <td>{{ $buyer->type }}</td>

                                    <td>{{ $buyer->status }}</td>
                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('staff.buyer.show', ['buyer' => $buyer->id]) }}">Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class=" me-4">
                        {{ $buyers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
