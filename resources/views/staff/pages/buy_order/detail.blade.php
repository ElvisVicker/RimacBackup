@extends('staff.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('staff.buy_order.update', ['buy_order' => $buy_order->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Edit Buyer</h6>
                    {{-- {{ dd($buy_order) }} --}}



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="buyer_id" name="buyer_id"
                            value="{{ $buy_order->buyer_id }}" placeholder="buyer_id">
                        <label for="floatingInput">Buyer ID</label>
                    </div>
                    @error('buyer_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $buy_order->first_name }}" placeholder="name@first_name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name"
                            value="{{ $buy_order->last_name }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $buy_order->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $buy_order->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="car_id" name="car_id"
                            value="{{ $buy_order->car_id }}" placeholder="car_id">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('car_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="car_name" name="car_name"
                            value="{{ $buy_order->car_name }}" placeholder="car_name">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('car_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ $buy_order->price }}" placeholder="price">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('price')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="staff_id" name="staff_id"
                            value="{{ $buy_order->staff_id }}" placeholder="staff_id">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('staff_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="staff_name" name="staff_name"
                            value="{{ $buy_order->staff_name }}" placeholder="staff_name">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('staff_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $buy_order->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $buy_order->updated_at }}" placeholder="updated_at" readonly>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
