@extends('admin/layout/master')

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
                        <h6 class="mb-4 ">Account List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.account.create') }}">Create Account</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @forelse ($accounts as $account)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                            $imagesLink = is_null($account->image) || !file_exists('images/' . $account->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $account->image);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style="width: 50px; height: 50px">
                                    </td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->last_name }}</td>
                                    <td>{{ $account->role }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->phone_number }}</td>
                                    <td>{{ $account->status }}</td>
                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.account.show', ['account' => $account->id]) }}">Edit</a>
                                        <form action="{{ route('admin.account.destroy', ['account' => $account->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger m-2" type="submit" name="delete"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class=" me-4">
                        {{ $accounts->links('pagination::bootstrap-5') }}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection
