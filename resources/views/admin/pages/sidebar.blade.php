<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">


        <style>
            .logoFilter {
                filter: invert(50%);
            }
        </style>

        <a href="{{ route('admin.chart') }}" class="navbar-brand mx-4 mb-3">
            <img src="{{ asset('images/logo.png') }}" height="50px" class="logoFilter" alt="" srcset="">
        </a>




        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('images/' . auth()->user()->image) }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    {{ auth()->user()->name }}
                </h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100 ">
            <a href="{{ route('admin.chart') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('admin.account.index') }}" class="nav-item nav-link "><i
                    class="fa fa-th me-2"></i>Account</a>
            <a href="{{ route('admin.brand.index') }}" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Brand</a>
            <a href="{{ route('admin.buyer.index') }}" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Buyer</a>
            <a href="{{ route('admin.car.index') }}" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Car</a>
            <a href="{{ route('admin.car_category.index') }}" class="nav-item nav-link "><i
                    class="fa fa-th me-2"></i>Car
                Category</a>
            <a href="{{ route('admin.car_images.index') }}" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Car
                Images</a>
            <a href="{{ route('admin.contact.index') }}" class="nav-item nav-link "><i
                    class="fa fa-th me-2"></i>Contact</a>
        </div>
    </nav>
</div>
