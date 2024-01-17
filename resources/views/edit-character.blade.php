<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | Uprav si postavu</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/character.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
</head>

<body class="register-body">
    @auth
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
                                    <i style="vertical-align: middle" class="bi bi-house-heart-fill"></i>
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
                                        <li class="dropdown-item" style="pointer-events: none">{{ auth()->user()->name }}</li>
                                        <li class="dropdown-item">
                                            <button id="btn-edit-profile" class="dropdown-item" style="background: none; padding: 0;">Upraviť profil</button>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('create-character-page') }}">Vytvoriť postavu</a></li>
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
        </div>

        <div class="window-container">
            <div class="register-window">
                <div class="login-form">
                    <h2>Uprav si postavu</h2>
                    <form class="needs-validation" novalidate action="/edit-character/{{ $character->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-md-6">
                                    <img id="image" alt="Character Image Placeholder" style="object-position: center" src="{{ $character->image_url }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="row row-height">
                                        <div class="col-md-12">
                                            <div id="name" class="login-form-el" data-bs-theme="dark">
                                                <label for="create-character-name">Meno</label>
                                                <input name="name" id="create-character-name" type="text" value="{{ $character->name }}" class="bg-light form-control" required>
                                                <div class="invalid-feedback">
                                                    Zadaj, prosím, meno postavy.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-height">
                                        <div class="col-md-12">
                                            <div id="surname" class="login-form-el" data-bs-theme="dark">
                                                <label for="create-character-surname">Priezvisko</label>
                                                <input name="surname" id="create-character-surname" type="text" value="{{ $character->surname }}" class="bg-light form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-height">
                                        <div class="col-md-12">
                                            <div id="age" class="login-form-el" data-bs-theme="dark">
                                                <label for="create-character-age">Vek</label>
                                                <input name="age" id="create-character-age" type="number" value="{{ $character->age }}" class="bg-light form-control" required min="1">
                                                <div class="invalid-feedback">
                                                    Zadaj, prosím, vek postavy.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-height">
                                        <div class="col-md-12">
                                            <div id="imageurl" class="login-form-el" data-bs-theme="dark" style="margin-bottom: 0">
                                                <label for="create-character-image-url">Obrázok</label>
                                                <input name="image_url" id="create-character-image-url" type="url" value="{{ $character->image_url }}" class="bg-light form-control" required>
                                                <div class="invalid-feedback">
                                                    Zadaj, prosím, url adresu obrázka.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="bio" class="login-form-el" data-bs-theme="dark">
                                        <label for="create-character-bio">Životopis</label>
                                        <textarea name="bio" id="create-character-bio" type="text" class="bg-light form-control" required minlength="300">{{ $character->bio }}</textarea>
                                        <div class="invalid-feedback">
                                            Zadaj, prosím, životopis o dĺžke najmenej 300 znakov.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="description" class="login-form-el" data-bs-theme="dark">
                                        <label for="create-character-description">Opis</label>
                                        <textarea name="description" id="create-character-description" type="text" class="bg-light form-control" required minlength="300">{{ $character->description }}</textarea>
                                        <div class="invalid-feedback">
                                            Zadaj, prosím, opis o dĺžke najmenej 300 znakov.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="container-flex cont-flex2 login-form-el">
                                    <button type="submit" class="btn btn-custom4 submit-textarea" style="margin-right: 0">Uložiť zmeny</button>
                                </div>
                            </div>
                        </div>

                    </form>
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
    @else
        <div class="container-fluid">
            <h1 class="no-access">Nepovolený vstup!</h1>
        </div>
    @endauth

    <script src="../js/form-validation.js"></script>
    <script src="../js/character.js"></script>
    <script src="../js/dynamic-textarea.js"></script>
</body>
</html>
