<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | O postave</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/character.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="register-body">
    <div class="container-navbar">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-toggler-custom mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom active" aria-current="page" href="{{ route('home') }}">
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
                                    <li>
                                        <form action="/logout" method="POST" class="dropdown-item">
                                            @csrf
                                            <button class="dropdown-item" style="background: none; padding: 0">Odhlásiť sa</button>
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('create-character-page') }}">Vytvoriť postavu</a></li>
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
    </div>

    <div class="window-container">
    <div class="show-window">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img id="image" src={{ $character->image_url }}>
                </div>
                <div id="top-right" class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Meno</label>
                            <h3 id="create-character-name">{{ $character->name }}</h3>
                        </div>
                        <div class="col-md-6">
                            <label>Priezvisko</label>
                            <h3 id="create-character-surname">{{ $character->surname }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Vek</label>
                            <h3 id="create-character-age">{{ $character->age }} rokov</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Používateľ</label>
                            <h3 id="create-character-age">{{ $character->user->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Životopis</label>
                    <p id="create-character-bio">{{ $character->bio }}</p>
                </div>
                <div class="col-md-6">
                    <label>Opis</label>
                    <p id="create-character-bio">{{ $character->description }}</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid">
        <footer class="py-3">
            <div class="container-fluid border-bottom" data-bs-theme="dark">
                <form class="search-bar d-flex" role="search">
                    <input class="bg-dark form-control me-2" type="search" placeholder="Hľadaný text" aria-label="Search">
                    <button class="btn btn-custom" type="submit">
                        <i class="bi bi-search-heart btn-icon-padding"></i>
                        Hľadaj</button>
                </form>
            </div>
            <p class="text-center text-light footer-padding">Daniela Pavlíková | 2023</p>
        </footer>
    </div>

    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="login-form">
            <h2>Prihlásenie</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="username">Prihlasovacie meno</label>
                    <input name="login-name" type="text" id="username" placeholder="Zadaj prihlasovacie meno" class="bg-dark form-control">
                </div>
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="password">Heslo</label>
                    <input name="login-password" type="password" id="password" placeholder="Zadaj heslo" class="bg-dark form-control">
                </div>
                <div class="login-form-el">
                    <button class="btn btn-custom">Prihlásiť sa</button>
                </div>
                <div class="login-form-el">
                    <p>Ešte nemáš účet? <a href="{{ route('register-page') }}">Zaregistruj sa!</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
