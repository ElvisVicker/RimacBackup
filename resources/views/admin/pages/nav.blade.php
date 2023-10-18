 <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
     <style>
         .logoFilter {
             filter: invert(50%);
         }
     </style>

     <a href="{{ route('admin.chart') }}" class="navbar-brand d-flex d-lg-none me-4">
         <img src="{{ asset('images/logo.png') }}" height="50px" class="logoFilter" alt="" srcset="">
     </a>

     <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
     </a>



     <div class="navbar-nav align-items-center ms-auto">

         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <img class="rounded-circle me-lg-2" src="{{ asset('images/' . auth()->user()->image) }}" alt=""
                     style="width: 40px; height: 40px; object-fit:cover;">
                 <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                 <x-dropdown-link :href="route('profile.edit')">
                     {{ __('Profile') }}
                 </x-dropdown-link>

                 <form method="POST" action="{{ route('logout') }}">
                     @csrf

                     <x-dropdown-link :href="route('logout')"
                         onclick="event.preventDefault();
                                           this.closest('form').submit();">
                         {{ __('Log Out') }}
                     </x-dropdown-link>
                 </form>
             </div>
         </div>
     </div>
 </nav>
