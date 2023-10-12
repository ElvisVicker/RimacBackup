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
                        <a class="btn btn-success p-2" href="{{ route('staff.buyer.create') }}">Create Account</a>
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
                                    <td>{{ $buyer->type ? 'Buy' : 'Rent' }}</td>

                                    <td>
                                        <div class="{{ $buyer->status ? 'btn btn-success m-2 ' : 'btn btn-danger m-2 ' }} ">
                                            {{ $buyer->status ? 'Checked' : 'Uncheck' }}
                                        </div>
                                    </td>
                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('staff.buyer.show', ['buyer' => $buyer->id]) }}">Edit
                                        </a>
                                        <form action="{{ route('staff.buyer.destroy', ['buyer' => $buyer->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger m-2" type="submit" name="delete"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                        {{-- {{ dd(route('staff.buyer.send_to_order', ['id' => $buyer->id])) }} --}}

                                        @if ($buyer->send === 0)
                                            <a class="btn btn-info m-2"
                                                href="{{ route('staff.buyer.send_to_order', ['id' => $buyer->id]) }}">Send
                                                to order
                                            </a>
                                        @endif


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
