<div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link fw-bold">
                    @if (Session::has('user'))
                        Welcome, {{ Session::get('user')['real_name']->fname }} {{ Session::get('user')['real_name']->lname }}({{Session::get('user')['user_type']}})
                    @endif
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
           
        </ul>
    </nav>
    <!-- /.navbar -->
</div>
