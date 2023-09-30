@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('admin.car.update', ['car' => $car->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Create Car</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}"
                            placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $car->slug }}"
                            placeholder="slug">
                        <label for="floatingInput">Slug</label>
                    </div>
                    @error('slug')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="price" name="price" value="{{ $car->price }}"
                            placeholder="price">
                        <label for="floatingInput">Price</label>
                    </div>
                    @error('price')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Description" name="description" id="description">{{ $car->description }}</textarea>
                        {{-- <label for="description">Description</label> --}}
                    </div>
                    @error('description')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="qty" name="qty" value="{{ $car->qty }}"
                            placeholder="qty">
                        <label for="floatingInput">Quantity</label>
                    </div>
                    @error('qty')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="model" name="model"
                            value="{{ $car->model }}" placeholder="model">
                        <label for="floatingInput">Model</label>
                    </div>
                    @error('model')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="color" name="color"
                            value="{{ $car->color }}" placeholder="color">
                        <label for="floatingInput">Color</label>
                    </div>
                    @error('color')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fueltype" name="fueltype"
                            value="{{ $car->fueltype }}" placeholder="fueltype">
                        <label for="floatingInput">Fuel Type</label>
                    </div>
                    @error('fueltype')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="year" name="year"
                            value="{{ $car->year }}" placeholder="year">
                        <label for="floatingInput">Year</label>
                    </div>
                    @error('year')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    {{-- Image --}}


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="video" name="video"
                            value="{{ $car->video }}" placeholder="video">
                        <label for="floatingInput">Video Link</label>
                    </div>
                    @error('video')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sittingfor" name="sittingfor"
                            value="{{ $car->sittingfor }}" placeholder="sittingfor">
                        <label for="floatingInput">Sitting For</label>
                    </div>
                    @error('sittingfor')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="transmission_type" name="transmission_type"
                            value="{{ $car->transmission_type }}" placeholder="transmission_type">
                        <label for="floatingInput">Transmission Type</label>
                    </div>
                    @error('transmission_type')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="width" name="width"
                            value="{{ $car->width }}" placeholder="width">
                        <label for="floatingInput">Width</label>
                    </div>
                    @error('width')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="height" name="height"
                            value="{{ $car->height }}" placeholder="height">
                        <label for="floatingInput">Height</label>
                    </div>
                    @error('height')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="length" name="length"
                            value="{{ $car->length }}" placeholder="length">
                        <label for="floatingInput">Length</label>
                    </div>
                    @error('length')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="wheelbase" name="wheelbase"
                            value="{{ $car->wheelbase }}" placeholder="wheelbase">
                        <label for="floatingInput">Wheelbase</label>
                    </div>
                    @error('wheelbase')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="combined" name="combined"
                            value="{{ $car->combined }}" placeholder="combined">
                        <label for="floatingInput">Combined</label>
                    </div>
                    @error('combined')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="motorway" name="motorway"
                            value="{{ $car->motorway }}" placeholder="motorway">
                        <label for="floatingInput">Motorway</label>
                    </div>
                    @error('motorway')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="urban" name="urban"
                            value="{{ $car->urban }}" placeholder="urban">
                        <label for="floatingInput">Urban</label>
                    </div>
                    @error('urban')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="emission_co2" name="emission_co2"
                            value="{{ $car->emission_co2 }}" placeholder="emission_co2">
                        <label for="floatingInput">Emission CO2</label>
                    </div>
                    @error('emission_co2')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="engine_size" name="engine_size"
                            value="{{ $car->engine_size }}" placeholder="engine_size">
                        <label for="floatingInput">Engine Size</label>
                    </div>
                    @error('engine_size')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="maxKw" name="maxKw"
                            value="{{ $car->maxKw }}" placeholder="maxKw">
                        <label for="floatingInput">MaxKw</label>
                    </div>
                    @error('maxKw')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="maxHp" name="maxHp"
                            value="{{ $car->maxHp }}" placeholder="maxHp">
                        <label for="floatingInput">MaxHp</label>
                    </div>
                    @error('maxHp')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="acceleration" name="acceleration"
                            value="{{ $car->acceleration }}" placeholder="acceleration">
                        <label for="floatingInput">Acceleration</label>
                    </div>
                    @error('acceleration')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ $car->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ $car->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="extra_equipment" name="extra_equipment"
                            value="{{ $car->extra_equipment }}" placeholder="extra_equipment">
                        <label for="floatingInput">Extra Equipment</label>
                    </div>
                    @error('extra_equipment')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="brand_id">
                        <option value="">--Brand--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id === $car->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        name="car_category_id">
                        <option value="">--Car Category--</option>
                        @foreach ($carCategories as $carCategory)
                            <option value="{{ $carCategory->id }}"
                                {{ $carCategory->id === $car->car_category_id ? 'selected' : '' }}>
                                {{ $carCategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('car_category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror




                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $car->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $car->updated_at }}" placeholder="updated_at" disabled>
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

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                let name = $('#name').val();
                console.log(name);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.car.create.slug') }}",
                    data: {
                        'name': name,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);
                    }
                });
            })
        })
    </script>
@endsection
