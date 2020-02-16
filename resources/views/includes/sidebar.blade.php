<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <div class="text-center my-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="logo">
                    <span class="h4 logo-lg">Test task</span>
                </a>
            </div>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link @if(\App\Helpers\Url\Url::hasString('employees')) active @endif">
                        <i class="nav-icon fa fa-users"></i>Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('positions.index') }}" class="nav-link @if(\App\Helpers\Url\Url::hasString('positions')) active @endif">
                        <i class="nav-icon fa fa-book"></i>Positions
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
