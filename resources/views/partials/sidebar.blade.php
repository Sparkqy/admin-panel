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
                    <a href="{{ route('employees.index') }}"
                       class="nav-link @if(\Illuminate\Support\Str::contains(url()->current(), 'employees')) active @endif">
                        <i class="nav-icon fa fa-users"></i>Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('positions.index') }}"
                       class="nav-link @if(\Illuminate\Support\Str::contains(url()->current(), 'positions')) active @endif">
                        <i class="nav-icon fa fa-book"></i>Positions
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('currencies.index') }}"
                       class="nav-link @if(\Illuminate\Support\Str::contains(url()->current(), 'currencies')) active @endif">
                        <i class="nav-icon fa fa-money"></i>Currency settings
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
