<nav class="main-header navbar navbar-expand navbar-gray">
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
