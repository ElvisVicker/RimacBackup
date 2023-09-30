<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('client.home') }}" class="logo">



                        <style>
                            .testFilter {
                                filter: invert(100%);
                            }

                            .background-header .testFilter {
                                filter: invert(0%);
                            }
                        </style>

                        {{-- Car Dealer<em> Website</em> --}}
                        <img src="{{ asset('images/logo.png') }}" height="40px" class="testFilter" alt=""
                            srcset="">


                    </a>






                    <!-- ***** Logo End ***** -->
                    {{-- class="active" --}}
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('client.home') }}">Home</a></li>
                        <li><a href="{{ route('client.cars') }}">Cars</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('client.about') }}">About Us</a>
                                <a class="dropdown-item" href="{{ route('client.blog') }}">Blog</a>
                                <a class="dropdown-item" href="{{ route('client.team') }}">Team</a>
                                <a class="dropdown-item" href="{{ route('client.testimonials') }}">Testimonials</a>
                                <a class="dropdown-item" href="{{ route('client.faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ route('client.terms') }}">Terms</a>
                            </div>
                        </li>
                        <li><a href="{{ route('client.contact') }}">Contact</a></li>
                        <li><a href="{{ route('dashboard') }}">Login</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
