@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('admin.account.update', ['account' => $account->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Create Account</h6>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}"
                            placeholder="name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            value="{{ $account->middle_name }}" placeholder="middle_name">
                        <label for="floatingInput">Middle Name</label>
                    </div>
                    @error('middle_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $account->last_name }}" placeholder="last_name">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                {{ $account->gender == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="0"
                                {{ $account->gender == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $account->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    {{-- <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ $account->password }}" placeholder="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    @error('password')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror --}}


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $account->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $account->address }}" placeholder="address">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Avatar</label>
                        <input class="form-control bg-dark" type="file" name="image" id="image">
                    </div>
                    @error('image')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="1"
                                {{ $account->role == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="0"
                                {{ $account->role == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Staff</label>
                        </div>
                    </div>
                    @error('role')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status"
                                {{ $account->status == '1' ? 'checked' : '' }} value="1">
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status"
                                {{ $account->status == '0' ? 'checked' : '' }} value="0">
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $account->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $account->updated_at }}" placeholder="updated_at" disabled>
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
