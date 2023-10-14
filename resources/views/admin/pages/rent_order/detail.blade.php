@extends('admin.layout.master')

@section('content')
    <style>
        .blackText {
            color: #000;
        }
    </style>



    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('admin.rent_order.update', ['rent_order' => $rent_order[0]->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Rent Detail</h6>



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="id" name="id" readonly
                            value="{{ $rent_order[0]->id }}" placeholder="id">
                        <label for="floatingInput">Order ID</label>
                    </div>
                    @error('id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="buyer_id" name="buyer_id" readonly
                            value="{{ $buyer[0]->id }}" placeholder="buyer_id">
                        <label for="floatingInput">Buyer ID</label>
                    </div>
                    @error('buyer_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="first_name" name="first_name" readonly
                            value="{{ $buyer[0]->first_name }}" placeholder="name@first_name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="last_name" name="last_name"
                            placeholder="last_name" readonly value="{{ $buyer[0]->last_name }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control blackText" id="email" name="email" readonly
                            value="{{ $buyer[0]->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="phone_number" name="phone_number" readonly
                            value="{{ $buyer[0]->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="address" name="address" readonly
                            value="{{ $buyer[0]->address }}" placeholder="address">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="day" name="day" readonly
                            value="{{ $buyer[0]->day }}" placeholder="day">
                        <label for="floatingInput">Rental Days</label>
                    </div>
                    @error('day')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="car_id" name="car_id" readonly
                            value="{{ $car[0]->id }}" placeholder="car_id">
                        <label for="floatingInput">Car ID</label>
                    </div>
                    @error('car_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="car_name" name="car_name" readonly
                            value="{{ $car[0]->name }}" placeholder="car_name">
                        <label for="floatingInput">Car Name</label>
                    </div>
                    @error('car_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control blackText" id="rent_price" name="rent_price" readonly
                            value="{{ $car[0]->rent_price }}" placeholder="rent_price">
                        <label for="floatingInput">Price/day</label>
                    </div>
                    @error('rent_price')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="staff_id" name="staff_id" readonly
                            value="{{ $user[0]->id }}" placeholder="staff_id">
                        <label for="floatingInput">Staff ID</label>
                    </div>
                    @error('staff_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="staff_name" name="staff_name" readonly
                            value="{{ $user[0]->name }}" placeholder="staff_name">
                        <label for="floatingInput">Staff First Name</label>
                    </div>
                    @error('staff_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="last_name" name="last_name" readonly
                            value="{{ $user[0]->last_name }}" placeholder="last_name">
                        <label for="floatingInput">Staff Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="created_at" name="created_at"
                            value="{{ $rent_order[0]->created_at }}" placeholder="created_at" readonly>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="updated_at" name="updated_at"
                            value="{{ $rent_order[0]->updated_at }}" placeholder="updated_at" readonly>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit" value="Back to list">
                </form>
            </div>
        </div>
    </div>
@endsection
