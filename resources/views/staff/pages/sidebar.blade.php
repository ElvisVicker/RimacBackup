       <div class="sidebar pe-4 pb-3">
           <nav class="navbar bg-secondary navbar-dark">



               {{-- <a href="index.html" class="navbar-brand mx-4 mb-3">
                   <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
               </a> --}}


               <style>
                   .logoFilter {
                       filter: invert(50%);
                   }
               </style>

               <a href="{{ route('staff.buyer.index') }}" class="navbar-brand mx-4 mb-3">
                   <img src="{{ asset('images/logo.png') }}" height="50px" class="logoFilter" alt="" srcset="">
               </a>




               <div class="d-flex align-items-center ms-4 mb-4">
                   <div class="position-relative">
                       <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                       <div
                           class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                       </div>
                   </div>
                   <div class="ms-3">
                       <h6 class="mb-0">
                           {{ auth()->user()->name }}
                       </h6>
                       <span>Staff</span>
                   </div>
               </div>
               <div class="navbar-nav w-100">
                   <a href="{{ route('staff.buyer.index') }}" class="nav-item nav-link active"><i
                           class="fa fa-tachometer-alt me-2"></i>Buyer</a>

                   <a href="{{ route('staff.buy_order.index') }}" class="nav-item nav-link"><i
                           class="fa fa-th me-2"></i>Buy Order</a>

                   <a href="{{ route('staff.rent_order.index') }}" class="nav-item nav-link"><i
                           class="fa fa-keyboard me-2"></i>Rent Order</a>
                   <a href="{{ route('staff.contact.index') }}" class="nav-item nav-link"><i
                           class="fa fa-keyboard me-2"></i>Contact</a>

               </div>
           </nav>
       </div>
