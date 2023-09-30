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
                        <h2> <em>${{ $car[0]->price }}</em></h2>
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

            <div>
                <style>
                    /* SLIDER */
                    .slider {
                        width: auto;
                        height: 34rem;
                        margin: 0 auto;
                        position: relative;
                        overflow: hidden;
                    }

                    .slide {
                        position: absolute;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        /* THIS creates the animation! */
                        transition: transform 1s;
                    }

                    .slide>img {
                        object-fit: cover;
                    }

                    .slider__btn {
                        position: absolute;
                        top: 50%;
                        z-index: 10;
                        border: none;
                        background: rgba(255, 255, 255, 0.7);
                        font-family: inherit;
                        color: #333;
                        border-radius: 50%;
                        height: 40px;
                        width: 40px;
                        font-size: 25px;
                        cursor: pointer;
                    }

                    .slider__btn--left {
                        left: 6%;
                        transform: translate(-50%, -50%);
                    }

                    .slider__btn--right {
                        right: 6%;
                        transform: translate(50%, -50%);
                    }

                    .dots {
                        position: absolute;
                        bottom: 5%;
                        left: 50%;
                        transform: translateX(-50%);
                        display: flex;
                    }

                    .dots__dot {
                        border: none;
                        background-color: #b9b9b9;
                        opacity: 0.7;
                        height: 12px;
                        width: 12px;
                        border-radius: 50%;
                        margin-right: 1.75rem;
                        cursor: pointer;
                        transition: all 0.5s;
                    }

                    .dots__dot:last-child {
                        margin: 0;
                    }

                    .dots__dot--active {
                        background-color: #888;
                        opacity: 1;
                    }

                    .imageCustom {
                        width: 70%;
                        height: auto;
                        object-fit: cover;
                    }

                    .custom-buy-form {
                        background-color: #fff;

                    }


                    /* FORM */
                    .checkForm {
                        display: flex;
                        gap: 20px;
                    }

                    .buyInput {
                        width: 100%;
                        height: 40px;
                        padding: 6px;

                    }

                    .btnContainer {
                        display: flex;
                        justify-content: right;

                        width: 100%;
                        /* background-color: #000; */
                    }

                    .buySumbit {
                        width: fit-content;
                        height: fit-content;
                        padding: 8px 40px;
                        border: 1px solid #000;
                        border-radius: 2px;
                        background-color: #ed563b;
                        transition: 0.3s;

                    }

                    .buySumbit:hover {
                        border: 1px solid #bbbbbb;
                        color: #e7e7e7;
                        background-color: #ff5334;
                    }
                </style>


                <div class="slider">
                    @foreach ($car as $item)
                        @foreach (explode(', ', $item->car_image) as $image)
                            <div class="slide">
                                <img class="imageCustom" src="{{ asset('images/' . $image) }}" alt="">
                            </div>
                        @endforeach
                    @endforeach


                    <button class="slider__btn slider__btn--left">&larr;</button>
                    <button class="slider__btn slider__btn--right">&rarr;</button>
                    <div class="dots"></div>
                </div>
                <script>
                    const slider = function() {
                        const slides = document.querySelectorAll('.slide');
                        const btnLeft = document.querySelector('.slider__btn--left');
                        const btnRight = document.querySelector('.slider__btn--right');
                        const dotContainer = document.querySelector('.dots');

                        let curSlide = 0;
                        const maxSlide = slides.length;


                        const createDots = function() {
                            slides.forEach(function(_, i) {
                                dotContainer.insertAdjacentHTML(
                                    'beforeend',
                                    `<button class="dots__dot" data-slide="${i}"></button>`
                                );
                            });
                        };

                        const activateDot = function(slide) {
                            document
                                .querySelectorAll('.dots__dot')
                                .forEach(dot => dot.classList.remove('dots__dot--active'));

                            document
                                .querySelector(`.dots__dot[data-slide="${slide}"]`)
                                .classList.add('dots__dot--active');
                        };

                        const goToSlide = function(slide) {
                            slides.forEach(
                                (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
                            );
                        };

                        // Next slide
                        const nextSlide = function() {
                            if (curSlide === maxSlide - 1) {
                                curSlide = 0;
                            } else {
                                curSlide++;
                            }

                            goToSlide(curSlide);
                            activateDot(curSlide);
                        };

                        const prevSlide = function() {
                            if (curSlide === 0) {
                                curSlide = maxSlide - 1;
                            } else {
                                curSlide--;
                            }
                            goToSlide(curSlide);
                            activateDot(curSlide);
                        };

                        const init = function() {
                            goToSlide(0);
                            createDots();

                            activateDot(0);
                        };
                        init();


                        btnRight.addEventListener('click', nextSlide);
                        btnLeft.addEventListener('click', prevSlide);

                        document.addEventListener('keydown', function(e) {
                            if (e.key === 'ArrowLeft') prevSlide();
                            e.key === 'ArrowRight' && nextSlide();
                        });

                        dotContainer.addEventListener('click', function(e) {
                            if (e.target.classList.contains('dots__dot')) {
                                const {
                                    slide
                                } = e.target.dataset;
                                goToSlide(slide);
                                activateDot(slide);
                            }
                        });



                        let autoSlide = function() {
                            nextSlide()
                        }
                        setInterval(autoSlide, 5000);
                    };
                    slider();
                </script>
            </div>

            <br>
            <br>

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                        <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                        <li><a href='#tabs-4'><i class="fa fa-shopping-cart"></i> Buy</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content' style="width: 100%;">
                        <article id='tabs-1'>
                            <h4>Vehicle Specs</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Name</label>

                                    <p>{{ $car[0]->name }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Brand</label>
                                    <div>

                                        <img height="50" src="{{ asset('images/' . $car[0]->brand_image) }}"
                                            alt=""> <span>
                                            <p>{{ $car[0]->brand_name }}</p>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Model</label>

                                    <p>{{ $car[0]->model }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Type</label>

                                    <p>{{ $car[0]->car_category_name }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label> Color</label>

                                    <p>{{ $car[0]->color }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label> Quantity</label>

                                    <p>{{ $car[0]->qty }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Rent Price</label>

                                    <p>{{ $car[0]->car_category_rent_price }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Width</label>

                                    <p>{{ $car[0]->width }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Height</label>

                                    <p>{{ $car[0]->height }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Length</label>

                                    <p>{{ $car[0]->length }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Wheelbase</label>

                                    <p>{{ $car[0]->wheelbase }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Seats</label>

                                    <p>{{ $car[0]->sittingfor }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Gearbox</label>

                                    <p>{{ $car[0]->transmission_type }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>EC Combined</label>

                                    <p>{{ $car[0]->combined }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>EC Motor Way</label>

                                    <p>{{ $car[0]->motorway }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>EC Urban</label>

                                    <p>{{ $car[0]->urban }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>CO2</label>

                                    <p>{{ $car[0]->emission_co2 }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Engine Size</label>

                                    <p>{{ $car[0]->engine_size }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Engine Capacity</label>

                                    <p>{{ $car[0]->maxKw }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Engine Power</label>

                                    <p>{{ $car[0]->maxHp }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>0 to 100 km</label>

                                    <p>{{ $car[0]->acceleration }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Fuel</label>

                                    <p>{{ $car[0]->fueltype }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Year</label>

                                    <p>{{ $car[0]->year }}</p>
                                </div>




                            </div>
                        </article>
                        <article id='tabs-2'>
                            <h4>Vehicle Description</h4>
                            <p>{!! $car[0]->description !!}</p>
                            {{-- <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking - remote
                                <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> - Radio <br> -
                                CD player <br> - Ideal first car <br> - Warranty <br> - High level brake light <br> Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p> --}}
                            <a target="_blank" href="{{ $car[0]->video ?? '#' }}">Watch it</a>


                        </article>
                        <article id='tabs-3'>
                            <h4>Vehicle Extras</h4>
                            <div class="row">
                                @foreach ($car as $item)
                                    @foreach (explode(', ', $item->extra_equipment) as $equipment)
                                        <div class="col-sm-6">
                                            <p>{{ $equipment }}</p>
                                        </div>
                                    @endforeach
                                @endforeach
                                {{-- <div class="col-sm-6">
                                    <p>Electric heated seats</p>
                                </div> --}}
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <h4>Your Information</h4>

                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <label>Name</label>

                                    <p>John Smith</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone</label>

                                    <p>123-456-789 </p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Mobile phone</label>
                                    <p>456789123 </p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <p><a href="#">john@carsales.com</a></p>
                                </div>
                            </div> --}}
                            {{-- {{ route('client.buy') }} --}}

                            {{-- {{ route('client.detail', ['id' => $car->id]) }} --}}

                            {{-- {{ dd(route('client.detail.store', ['id' => $car[0]->id])) }} --}}

                            {{-- {{ route('client.detail.store', ['id' => $car->id]) }} --}}

                            {{-- {{ dd($car[0]) }} --}}
                            {{-- dd(route('client.detail.store', [$request->id])); --}}


                            <div class="col-lg-12 col-md-12 col-xs-12 p-3 buy-form">
                                <div class="custom-buy-form">
                                    <form id="buy" action="{{ route('client.detail.store', ['id' => $car[0]->id]) }}"
                                        method="post">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="first_name" type="text" id="first_name"
                                                        placeholder="First Name" required="">
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="middle_name" type="text"
                                                        id="middle_name" placeholder="Middle Name(Optional)">
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="last_name" type="text" id="last_name"
                                                        placeholder="Last Name*" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="phone_number" type="text"
                                                        id="phone_number" placeholder="Phone Number" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="email" type="email" id="email"
                                                        placeholder="Email" required="">
                                                </fieldset>
                                            </div>


                                            <div class="checkForm col-md-6 col-sm-12">
                                                <div class="">
                                                    <input class="" type="radio" name="gender" id="gender"
                                                        value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                                    <label class="" for="">Male</label>
                                                </div>
                                                <div class="">
                                                    <input class="" type="radio" name="gender" id="gender"
                                                        value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
                                                    <label class="" for="">Female</label>
                                                </div>
                                            </div>


                                            <div class="checkForm col-md-6 col-sm-12">
                                                <div class="">
                                                    <input class="" type="radio" name="type" id="type"
                                                        value="1" {{ old('type') == '1' ? 'checked' : '' }}>
                                                    <label class="" for="">Buy</label>
                                                </div>
                                                <div class="">
                                                    <input class="" type="radio" name="type" id="type"
                                                        value="0" {{ old('type') == '0' ? 'checked' : '' }}>
                                                    <label class="" for="">Rent</label>
                                                </div>
                                            </div>


                                            <div class="btnContainer">
                                                <button type="submit" id="form-submit " class=" buySumbit">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>













                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection
