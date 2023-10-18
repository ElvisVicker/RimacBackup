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
                       <img class="rounded-circle" src="{{ asset('images/' . auth()->user()->image) }}" alt=""
                           style="width: 40px; height: 40px; object-fit:cover;">
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

                   <a href="{{ route('client.home') }}" class="nav-item nav-link active">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                       </svg>
                       Go to Home Page
                   </a>

                   <a href="{{ route('staff.buyer.index') }}" class="nav-item nav-link "><svg
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                       </svg>Buyer</a>

                   <a href="{{ route('staff.buy_order.index') }}" class="nav-item nav-link"><svg
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                       </svg>Buy Order</a>

                   <a href="{{ route('staff.rent_order.index') }}" class="nav-item nav-link"><svg
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                       </svg>Rent Order</a>
                   <a href="{{ route('staff.contact.index') }}" class="nav-item nav-link"><svg
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                       </svg>Contact</a>

               </div>
           </nav>
       </div>
