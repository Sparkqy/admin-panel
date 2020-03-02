<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <div class="text-center my-3">
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
                <li class="nav-item">
                    <a href="" class="nav-link @if(\App\Helpers\Url\Url::hasString('currencies')) active @endif">
                        <i class="nav-icon fa fa-money"></i>Currencies
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
