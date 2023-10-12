@extends('client.layout.master')

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/client/images/video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Young talents and Rimac are contributing to the future</h6>
                <h2> <em>Rimac</em> & One <em>Young</em> World</h2>




                <div class="main-button">
                    <a href="{{ route('client.contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->



    {{-- {{ dd($cars) }} --}}




    <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Featured <em>Cars</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>You will find detailed information about all models, as well as current offers on our new cars.
                            You can get advice on your dream car from the comfort of
                            your own home.</p>
                    </div>
                </div>
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
                                    &nbsp; <sup>$</sup> {{ $car->price + (15 / 100) * $car->price }}
                                </span>

                                <h4>{{ $car->name }}</h4>

                                <p>
                                    <i class="fa fa-dashboard"></i>{{ $car->color }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i>{{ $car->engine_size }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> {{ $car->transmission_type }} &nbsp;&nbsp;&nbsp;
                                </p>

                                <ul class="social-icons">
                                    <li><a href="{{ route('client.detail', ['id' => $car->id]) }}">+ View Car</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach



                {{-- <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-2-720x480.jpg" alt="">
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
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-3-720x480.jpg" alt="">
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

            <div class="main-button text-center">
                <a href="{{ route('client.cars') }}">View Cars</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->
    <section class="section section-bg" id="schedule"
        style="background-image: url(    {{ asset('assets/client/images/about-fullscreen-1-1920x700.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Read <em>About Us</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>
                            Rimac is a leading digital marketplace and solutions provider for the automotive industry that
                            connects car shoppers with sellers.

                        </p>
                    </div>






                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p> Rimac invented car search. Our site and innovative solutions connect buyers and sellers to
                            match people with their perfect car. With our people spread across the U.S. we still maintain a
                            startup culture with innovation and passion for our people at the core of everything we do.</p>
                        <p> Rimac has an award-winning brand, leadership team, and the best and brightest employees in the
                            industry. We’ve been featured as one of the top places to work by The Chicago Tribune, Built in
                            Chicago
                            and Chicago Innovation.
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Read our <em>Blog</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor,
                            ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                        <li><a href='#tabs-2'>Aspernatur excepturi magni, placeat rerum nobis magnam libero!
                                Soluta.</a>
                        </li>
                        <li><a href='#tabs-3'>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non
                                adipisci nihil.</a></li>
                        <div class="main-rounded-button"><a href="{{ route('client.blog') }}">Read More</a></div>
                    </ul>
                </div>


                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src=" {{ asset('assets/client/images/blog-image-1-940x460.jpg') }}" alt="">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>

                            <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>

                            <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend
                                hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem
                                tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut,
                                accumsan diam.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>


                        <article id='tabs-2'>
                            <img src="{{ asset('assets/client/images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</h4>
                            <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
                            <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a
                                velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus
                                nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <img src="{{ asset('assets/client/images/blog-image-3-940x460.jpg') }}" alt="">
                            <h4>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non adipisci nihil.</h4>
                            <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
                            <p>Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere sit
                                amet. Aliquam pharetra, augue vel cursus porta, nisi tortor vulputate sapien, id
                                scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper vel,
                                accumsan a neque.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(    {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus
                            odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                        <div class="main-button">
                            <a href="{{ route('client.contact') }}">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->


    <!-- ***** Testimonials Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">

                        <h2>Read our <em>Testimonials</em></h2>
                        <img src="{{ asset('assets/client/images/line-dec.png') }}" alt="waves">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem incidunt alias minima
                            tenetur nemo necessitatibus?</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/features-first-icon.png') }}" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">


                                <img src=" {{ asset('assets/client/images/features-first-icon.png') }}" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/features-first-icon.png') }}"
                                    alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/features-first-icon.png') }}"
                                    alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ route('client.testimonials') }}">Read More</a>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->
@endsection
