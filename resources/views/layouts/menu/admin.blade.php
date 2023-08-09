
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('roomType.index')}}" class="nav-link">
                <i class="nav-icon fas fa-bath"></i>
                <p>
                    Room
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('booking.index')}}" class="nav-link ">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Bookings</p>
                    </a>
                </li>
               
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('staff.index')}}" class="nav-link ">
                        <i class="far fa-user nav-icon"></i>
                        <p>Staff</p>
                    </a>
                </li>
               
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('customer.index')}}" class="nav-link ">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Customers</p>
                    </a>
                </li>
               
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('price.index')}}" class="nav-link ">
                        <i class="far fa-credit-card nav-icon"></i>
                        <p>Price</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Setings</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Profile
                        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Change Password
        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('auth.logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Logout
        
                        </p>
                    </a>
                </li>

               
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Report
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('report.createGenderBasedReport')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Gender-Customer
                        
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        

    </ul>

</nav>
<!-- /.sidebar-menu -->
