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
                        <h6 class="mb-4 ">Rent Order</h6>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Buyer ID</th>
                                <th scope="col">Customer First Name</th>
                                <th scope="col">Rental Days</th>
                                <th scope="col">Total</th>

                                <th scope="col">Car ID</th>
                                <th scope="col">Car Name</th>


                                <th scope="col">Staff ID</th>
                                <th scope="col">Staff First Name</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($rent_orders as $rent_order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rent_order->id }}</td>
                                    <td>{{ $rent_order->buyer_id }}</td>
                                    <td>{{ $rent_order->cus_first_name }}</td>
                                    <td>{{ $rent_order->rent_day }}</td>
                                    <td>{{ $rent_order->total_price }}$</td>

                                    <td>{{ $rent_order->car_id }}</td>
                                    <td>{{ $rent_order->car_name }}</td>


                                    <td>{{ $rent_order->staff_id }}</td>
                                    <td>{{ $rent_order->staff_first_name }}</td>

                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('staff.rent_order.show', ['rent_order' => $rent_order->id]) }}">Detail
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
                        {{ $rent_orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
