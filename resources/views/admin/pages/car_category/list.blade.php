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
                        <h6 class="mb-4 ">Car Category List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.car_category.create') }}">Create Car Category</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rent Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($carCategories as $carCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $carCategory->name }}</td>
                                    <td>{!! $carCategory->description !!}</td>
                                    <td>{{ $carCategory->rent_price }}</td>
                                    <td>{{ $carCategory->status }}</td>


                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.car_category.show', ['car_category' => $carCategory->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('admin.car_category.destroy', ['car_category' => $carCategory->id]) }}"
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
                                    <td colspan="5">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class="me-4">
                        {{ $carCategories->links('pagination::bootstrap-5') }}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection
