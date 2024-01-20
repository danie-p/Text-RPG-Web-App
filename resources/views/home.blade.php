<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Domov</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
</head>

<body class="dark">
    <div id="forest">
        <div class="layer-bg layer" data-type="parallax" data-depth="0.10"></div>
        <div class="layer-1 layer" data-type="parallax" data-depth="0.20"></div>
        <div class="layer-2 layer" data-type="parallax" data-depth="0.50"></div>
        <div class="layer-3 layer" data-type="parallax" data-depth="0.80"></div>
        <div class="layer-overlay layer" data-type="parallax" data-depth="0.85">
            <h1 class="title title-light">AETHERIA</h1>
        </div>
        <div class="layer-4 layer" data-type="parallax" data-depth="1.00">
        </div>
        <div class="wrapper-center">
            <div class="floatie">
                <i class="feather-small bi bi-feather floatie-item"></i>
                <i class="feather-big bi bi-feather floatie-item"></i>
                <i class="feather-small bi bi-feather floatie-item"></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-toggler-custom mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom active" aria-current="page" href="#">
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

    <div id="forest-mobile"></div>

    <div id="content">
        <div class="container">
            <section class="first-section">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                    </div>
                    <div class="col-sm-6">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                    </div>
                </div>
                <div class="row">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo nisi mauris,
                        sed aliquam justo hendrerit a. Etiam neque libero, aliquet eget enim ut, faucibus
                        imperdiet est. Aenean vitae nunc at magna pellentesque iaculis. Suspendisse potenti.
                        Ut ultricies vel lectus iaculis luctus. Etiam faucibus commodo dignissim. Sed mi urna,
                        eleifend id diam in, euismod vestibulum leo. Aliquam ligula ex, tristique ut tortor vel,
                        rhoncus tempor tellus. Fusce tempus turpis non nulla volutpat ultrices. Morbi ultrices
                        sed sem nec pulvinar. Nunc luctus consequat finibus. Ut ac dolor ante. Aliquam pulvinar massa
                        quis ornare aliquam. Sed blandit lectus sed sapien aliquet, vitae rhoncus leo feugiat.
                    </p>
                    <p>
                        In sit amet laoreet nibh. In et ipsum ut quam finibus ornare. Donec placerat scelerisque
                        augue, sed aliquet nibh aliquam vitae. Proin quis ultricies risus. Nunc sollicitudin nisi
                        eget odio scelerisque, ut accumsan dui dapibus. Sed vel dolor a quam posuere ullamcorper sit
                        amet vitae mi. Vestibulum hendrerit auctor lacinia. Quisque pellentesque mollis felis, id
                        congue ex. Donec felis nisi, tristique vel aliquet et, porttitor nec eros. Integer tempus ut
                        velit in posuere.
                    </p>
                    <p>
                        Nullam non diam lacus. Mauris eu ex sed neque blandit dignissim. Morbi porttitor dignissim
                        magna nec pulvinar. Integer gravida at elit quis pharetra. Donec sodales metus et ultricies
                        fermentum. Phasellus hendrerit elementum fringilla. Mauris dui justo, dignissim eget rutrum
                        id, porta ut dolor. Etiam aliquam sem eget ipsum pharetra tristique. Proin congue ex est,
                        sed accumsan turpis pharetra a. Suspendisse interdum, felis non malesuada bibendum, odio
                        justo facilisis metus, quis feugiat eros nisl vel nunc. Mauris molestie malesuada augue,
                        id sollicitudin sem suscipit et. Curabitur sit amet maximus mi, sed lobortis libero.
                        Nam lacus turpis, egestas non gravida sit amet, egestas vel turpis.
                    </p>
                </div>
            </section>
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
    </div>

    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="login-form">
            <h2>Prihlásenie</h2>
            <form id="login-form" class="needs-validation" novalidate action="/login" method="POST">
                @csrf
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="username">Prihlasovacie meno</label>
                    <input name="login-name" type="text" id="username" placeholder="Zadaj prihlasovacie meno" class="bg-dark form-control" required>
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoje prihlasovacie meno.
                    </div>
                </div>
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="password">Heslo</label>
                    <input name="login-password" type="password" id="password" placeholder="Zadaj heslo" class="bg-dark form-control" required>
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoje heslo.
                    </div>
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

    @auth
    <div class="popup-edit">
        <div class="close-btn">&times;</div>
        <div class="login-form">
            <h2>Úprava profilu</h2>
            <form class="needs-validation" novalidate action="/edit-profile" method="POST">
                @csrf
                @method('PUT')
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="edit-username">Prihlasovacie meno</label>
                    <input name="login-name" type="text" id="edit-username" value="{{ auth()->user()->name }}" class="bg-dark form-control" required minlength="3" maxlength="20">
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoje nové meno o dĺžke 3-20 znakov.
                    </div>
                </div>
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="edit-email">e-mail</label>
                    <input name="login-email" type="email" id="edit-email" value="{{ auth()->user()->email }}" class="bg-dark form-control" required>
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoj nový e-mail v správnom tvare.
                    </div>
                </div>
                <div class="login-form-el">
                    <p id="edit-passwd">Pre zmenu hesla klikni <a style="cursor: pointer">tu!</a></p>
                </div>
                <div class="login-form-el show-edit-passwd" data-bs-theme="dark">
                    <div class="container-flex">
                        <label style="flex: 1" for="old-password">Staré heslo</label>
                        <div style="text-align: right" class="close-btn-passwd">&times;</div>
                    </div>
                    <input name="login-old-password" type="password" id="old-password" placeholder="Zadaj staré heslo" class="bg-dark form-control">
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoje staré heslo.
                    </div>
                </div>
                <div class="login-form-el show-edit-passwd" data-bs-theme="dark">
                    <label for="new-password">Nové heslo</label>
                    <input name="login-new-password" type="password" id="new-password" placeholder="Zadaj nové heslo" class="bg-dark form-control">
                    <div class="invalid-feedback">
                        Zadaj, prosím, svoje nové heslo najmenej o dĺžke 8 znakov.
                    </div>
                </div>
                <div class="login-form-el">
                    <button class="btn btn-custom">Uložiť zmeny</button>
                </div>
            </form>
        </div>
    </div>
    @endauth

    <script src="../js/form-validation.js"></script>
    <script src="../js/script.js"></script>
</body>
