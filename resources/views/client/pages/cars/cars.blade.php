@extends('client.layout.master')

@section('content')
    <!-- ***** Call to Action Start ***** -->



    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Cars</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="contact-form">
                {{-- {{ route('client.cars.filterdIndex') }} --}}

                <form action=" {{ route('client.cars') }}" id="contact" method="post">
                    @csrf
                    @method('post')


                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Category</label>

                                <select name="category">
                                    <option value="">--All--</option>
                                    @foreach ($carCategories as $carCategory)
                                        <option value="{{ $carCategory->id }}">{{ $carCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Brands</label>

                                <select name="brand">
                                    <option value="">--All--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Color</label>

                                <select name="color">
                                    <option value="">--All--</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->color }}">{{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fuel Type</label>

                                <select name="fueltype">
                                    <option value="">--All--</option>
                                    @foreach ($fueltypies as $fueltype)
                                        <option value="{{ $fueltype->fueltype }}">{{ $fueltype->fueltype }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Year</label>

                                <select name="year">
                                    <option value="">--All--</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->year }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Price</label>

                                <select name="price">
                                    <option value="">--All--</option>
                                    <option value="1">0-49.999</option>
                                    <option value="2">50.000-99.999</option>
                                    <option value="3"> > 100.000</option>
                                </select>
                            </div>
                        </div>





                    </div>
                    <div class="col-sm-4 offset-sm-4">





                        <div class="main-button text-center">

                            <button type="submit">Search</button>
                        </div>

                    </div>
                    <br>
                    <br>
                </form>
            </div>

            <div class="row">

                @foreach ($cars as $car)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                @php
                                    $firstCarImage = explode(',', $car->car_image)[0];
                                    $imagesLink = is_null($firstCarImage) || !file_exists('images/' . $firstCarImage) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $firstCarImage);
                                @endphp
                                <img src="{{ $imagesLink }}" alt="" srcset="">
                                {{-- <img src="assets/images/product-1-720x480.jpg" alt=""> --}}
                            </div>
                            <div class="down-content">
                                <span>
                                    <sup>$</sup> {{ $car->price }}
                                </span>

                                <h4>{{ $car->name }}</h4>
                                <div class="mb-1">{{ $car->car_category_name }}</div>
                                <p>
                                    <i class="fa fa-dashboard"></i>{{ $car->color }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i>{{ $car->engine_size }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> {{ $car->transmission_type }} &nbsp;&nbsp;&nbsp;
                                </p>

                                <ul class="social-icons">
                                    <li><a href="{{ route('client.detail', ['id' => $car->id]) }}">+ View Car</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <br>
            <nav>

                <style>
                    .page-link {
                        color: #ed563b;
                    }

                    .page-item.active .page-link {
                        z-index: 1;
                        color: #fff;
                        background-color: #ed563b;
                        border-color: #ed563b;
                    }
                </style>

                {{ $cars->links('pagination::bootstrap-5') }}

                {{-- <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul> --}}
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection
