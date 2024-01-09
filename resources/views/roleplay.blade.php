<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Hrad</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="rp-body">
    @auth
    <div class="container">
        <nav id="nav-header" class="navbar navbar-expand-lg navbar-custom-headerless">
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
                        <li id="drop" class="nav-item nav-item-custom dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Rázcestie
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Les</a></li>
                                <li><a class="dropdown-item" href="{{ route('castle') }}">Hrad</a></li>
                                <li><a class="dropdown-item" href="#">Podhradie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom" href="#">Obyvatelia</a>
                        </li>
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom" href="#">Nápoveda</a>
                        </li>
                        <li class="nav-item nav-item-custom nav-item-highlight">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="nav-link nav-link-custom nav-link-highlight">
                                    <i class="bi bi-person-heart btn-icon-padding"></i>
                                    Odhlásiť sa
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="rp-title title-headerless title-light">ROLEPLAY - HRAD</h1>

        <div class="first-section">

            <form action="/create-post" method="POST">
                @csrf
                <div class="mb-3 post-container">
                    <label for="exampleFormControlTextarea1" class="form-label">Príspevok</label>
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tu píš svoj príbeh" required minlength="10"></textarea>
                </div>
                <div class="mb-3 post-container">
                    <label for="formFile" class="form-label">Priložiť súbor</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                </div>
                <div class="input-group mb-3 input-quest">
                    <label class="input-group-text" for="inputGroupSelect02">Splenenie questu</label>
                    <select name="quest" class="form-select" id="inputGroupSelect02">
                        <option selected>Nie je vybratý žiadny quest</option>
                        <option value="1">Quest 1</option>
                        <option value="2">Quest 2</option>
                        <option value="3">Quest 3</option>
                    </select>
                </div>
                <button class="btn btn-custom ">Odoslať</button>
            </form>

        </div>

        @foreach ($posts as $post)
            <div class="first-section">
                <div class="rp-header">
                    {{ $post['user_id'] }}
                </div>
                <div class="rp-text">
                    <p>{{ $post['body'] }}</p>
                </div>
                @if(Auth::user()->id == $post['user_id'])
                    <div class="container-flex">
                        <button class="btn btn-custom1"><a href="/edit-post/{{ $post->id }}">Upraviť</a></button>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-custom2">Vymazať</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach

    </div>
    @else
    <div class="container-fluid">
        <h1 class="no-access">Nepovolený vstup!</h1>
    </div>

    @endauth

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

</body>
</html>
