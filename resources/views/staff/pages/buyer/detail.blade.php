@extends('staff.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('staff.buyer.update', ['buyer' => $buyer->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Buy Detail</h6>
                    {{-- {{ dd($buyer) }} --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name" disabled
                            value="{{ $buyer->first_name }}" placeholder="name@first_name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middle_name" name="middle_name" disabled
                            value="{{ $buyer->middle_name }}" placeholder="middle_name">
                        <label for="floatingInput">Middle Name</label>
                    </div>
                    @error('middle_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name"
                            disabled value="{{ $buyer->last_name }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                disabled {{ $buyer->gender == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="0"
                                disabled {{ $buyer->gender == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="address" class="form-control" id="address" name="address" disabled
                            value="{{ $buyer->address }}" placeholder="address@example.com">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" disabled
                            value="{{ $buyer->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" disabled
                            value="{{ $buyer->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="day" name="day" disabled
                            value="{{ $buyer->type == '0' ? $buyer->day : 'None' }}" placeholder="day">
                        <label for="floatingInput">Rental Days</label>
                    </div>
                    @error('day')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="1"
                                disabled {{ $buyer->type == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Buy</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="0"
                                disabled {{ $buyer->type == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Rent</label>
                        </div>
                    </div>
                    @error('type')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    @if ($buyer->send === 0)
                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status"
                                    value="1" {{ $buyer->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status"
                                    value="0" {{ $buyer->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    @else
                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" disabled
                                    value="1" {{ $buyer->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" disabled
                                    value="0" {{ $buyer->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    @endif

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $buyer->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $buyer->updated_at }}" placeholder="updated_at" readonly>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit"
                        value="{{ $buyer->send == 1 ? 'Back to list' : 'Submit' }}">
                </form>
            </div>
        </div>
    </div>
@endsection
