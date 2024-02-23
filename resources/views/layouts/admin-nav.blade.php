<nav class="navbar navbar-expand cs-bg px-lg-4 px-3 z-1 ">
    <!-- Logo -->
    <a class="navbar-brand" href="/">
        <img src="{{ asset('/img/clickspark-logo-white.png') }}" class="" alt="Logo" style="height: 38px">
    </a>


    <div class=" ms-auto" id="">
        <!-- Navigation Links -->
        <ul class="navbar-nav ms-auto mt-lg-0 nav-font align-items-center">

            <!-- Dashboard -->
            <li class="nav-item nav-line-hover" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ Auth::user()->name }}">
                <a class="nav-link" href="{{ route('admin') }}">
                    @if (auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Avatar" width="32" height="32" class="avatar ">
                    @else
                    <img src="img/default-avatar.jpg" alt="Default Avatar" width="32" height="32" class="avatar">
                    @endif
                </a>
            </li>

            <!-- Profile Setting -->
            <li class="nav-item nav-line-hover dropdown" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Profile Settings">
                <a class="nav-link nav-line-hover dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill-gear"></i></a>
                <ul class="dropdown-menu dropdown-menu-end border-0" aria-labelledby="navbarDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item dropdown-item-clicked cs-font" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
