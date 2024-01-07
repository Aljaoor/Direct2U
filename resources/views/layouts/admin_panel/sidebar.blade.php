<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Direct2U</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        admin permissions
    </div>

    <!-- Nav Item - user management -->
    @can('users management')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usermanagement"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user fa-cog"></i>
                <span>User Mangement</span>
            </a>
            <div id="usermanagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="ourColor py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.create') }}">add a new account</a>
                    <a class="collapse-item" href="{{ route('users.index') }}">account list</a>
                    <a class="collapse-item" href="{{ route('roles.index') }}">role management</a>

                </div>
            </div>

        </li>
    @endcan

    <!-- Nav Item - user restaurants -->
    @can('restaurants management')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#restaurantsmanagement"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user fa-cog"></i>
                <span>Restaurants</span>
            </a>
            <div id="restaurantsmanagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="ourColor py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('restaurants.create') }}">add a new restaurant</a>
                    <a class="collapse-item" href="{{ route('restaurants.get-restaurants') }}">restaurants list</a>
                    <a class="collapse-item" href="{{ route('restaurants.get-requests-to-be-restaurants') }}">requests to be
                        restaurants</a>
                </div>
            </div>
        </li>
    @endcan
    <!-- Nav Item - Categories -->
    @if (auth()->user()->hasRole(['Admin']) ||
            auth()->user()->hasRole(['Restaurant']))
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('meals.getCategories') }}" aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>Categories</span>
            </a>
        </li>
        {{--  meals   --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MealsManagement"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-hamburger fa-cog"></i>
                <span>Meals</span>
            </a>
            <div id="MealsManagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="ourColor py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('meals.create') }}">add a new meal</a>
                    <a class="collapse-item" href="{{ route('meals.index') }}">meals list</a>
                </div>
            </div>
        </li>
    @endif
    @can('messages')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('show_message') }}" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fa fa-comment" aria-hidden="true"></i>
            <span>messages</span>
        </a>
    </li>
    @endcan

    <!-- Nav Item - user restaurants -->
    @can('orders management')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('orders.get-unprocessed-orders') }}" aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fa fa-comment" aria-hidden="true"></i>
                <span>Unprocessed Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('orders.get-finished-orders') }}" aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fa fa-comment" aria-hidden="true"></i>
                <span>Finished Orders</span>
            </a>
        </li>
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
