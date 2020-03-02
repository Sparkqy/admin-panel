<nav class="navbar navbar-expand navbar-gray">
    <ul class="navbar-nav">
        <li class="nav-item ml-5">
            <a href="{{ url('/') }}" class="text-center navbar-brand">
                <span class="brand-text font-weight-light text-white">Test task</span>
            </a>
        </li>
    </ul>
    @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="btn">
                        <i class="fa fa-sign-out"></i>
                    </button>
                </form>
            </li>
        </ul>
    @endauth
</nav>
