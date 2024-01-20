<nav id="nav-header" class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid" style="z-index: 9999">
        <button class="navbar-toggler navbar-toggler-custom mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-dark"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item nav-item-custom" style="display: flex; justify-content: center; align-items: center;">
                    <a class="nav-link nav-link-custom active" aria-current="page" href="{{ route('home') }}" style="display: flex; align-items: center;">
                        <i class="bi bi-house-heart-fill"></i>
                    </a>
                </li>
                <li class="nav-item nav-item-custom dropdown">
                    <a class="nav-link nav-link-custom dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rázcestie
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Les</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('castle') }}">Hrad
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">Podhradie</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-custom">
                    <a class="nav-link nav-link-custom" href="{{ route('citizens') }}">Obyvatelia</a>
                </li>
                <li class="nav-item nav-item-custom">
                    <a class="nav-link nav-link-custom" href="#">Nápoveda</a>
                </li>
                @auth
                    <li class="nav-item nav-item-custom nav-item-highlight dropdown">
                        <button class="nav-link nav-link-custom nav-link-highlight dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-heart btn-icon-padding"></i>
                            Môj účet
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item" style="pointer-events: none"><b>{{ auth()->user()->name }}</b></li>
                            <li class="dropdown-item">
                                <button id="btn-edit-profile" class="dropdown-item" style="background: none; padding: 0;">Upraviť profil</button>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('create-character-page') }}">Vytvoriť postavu</a></li>
                            @if (Auth::user()->hasPermissionTo('manage-quest'))
                                <li><a class="dropdown-item" href="{{ route('create-quest-page') }}">Vytvoriť quest</a></li>
                            @endif
                            @if (Auth::user()->hasPermissionTo('manage-item'))
                                <li><a class="dropdown-item" href="{{ route('create-item-page') }}">Vytvoriť predmet</a></li>
                            @endif
                            <li>
                                <form action="/logout" method="POST" class="dropdown-item">
                                    @csrf
                                    <button class="dropdown-item" style="background: none; padding: 0; color: #D09125">Odhlásiť sa</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li id="login-b" class="nav-item nav-item-custom nav-item-highlight">
                        <button class="nav-link nav-link-custom nav-link-highlight">
                            <i class="bi bi-person-heart btn-icon-padding"></i>
                            Prihlásiť sa
                        </button>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
