<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Roleplay - Hrad</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
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
                            <a class="nav-link nav-link-custom" href="{{ route('citizens') }}">Obyvatelia</a>
                        </li>
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom" href="#">Nápoveda</a>
                        </li>
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
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="rp-title title-headerless title-light">ROLEPLAY - HRAD</h1>

        <div class="first-section">
            <label for="rp-post" class="form-label">Príspevok</label>
            <form id="rp-post" class="needs-validation" novalidate action="/create-post" method="POST">
                @csrf
                <div class="input-group mb-3 input-quest">
                    <select name="character" class="form-select" id="inputGroupSelect02" required>
                        <option disabled selected value>Vybrať postavu</option>
                        @foreach($characters as $character)
                            <option>{{ $character->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Vyber, prosím, postavu.
                    </div>
                </div>
                <div class="mb-3 post-container">
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tu píš svoj príbeh" required minlength="300"></textarea>
                    <div class="invalid-feedback">
                        Zadaj, prosím, príspevok o dĺžke najmenej 300 znakov.
                    </div>
                </div>
                <div class="mb-3 post-container">
                    <input name="image" class="form-control" type="file" id="formFile">
                </div>
                <div class="input-group mb-3 input-quest">
                    <select name="quest" class="form-select" id="inputGroupSelect02">
                        <option disabled selected>Splniť quest</option>
                        <option value="1">Quest 1</option>
                        <option value="2">Quest 2</option>
                        <option value="3">Quest 3</option>
                    </select>
                </div>
                <button class="btn btn-custom submit-textarea">Odoslať</button>
            </form>

        </div>

        @foreach ($posts as $post)
            <div class="first-section">
                <div class="container-flex">
                    <div style="flex: 1;" class="rp-header">
                        <b style="font-size: larger">{{ $post->character->name }} {{ $post->character->surname }}</b>
                        <span style="margin-left: 10px">{{ $post->user->name }}</span>
                    </div>
                    <div style="text-align: right; color: rgba(68, 141, 145, 1)" class="rp-header">
                        <b style="font-size: larger"></b>
                        {{ \Carbon\Carbon::parse($post->updated_at)->format('d.m.Y H:i:s') }}
                    </div>
                </div>
                <div class="rp-text">
                    <p>{{ $post['body'] }}</p>
                </div>
                @if(Auth::user()->id == $post['user_id'])
                    <div class="container-flex cont-flex1">
                        <button style="margin-right: 10px" class="btn btn-custom1">
                            <a href="/edit-post/{{ $post->id }}">
                                <i class="bi bi-feather btn-icon-padding"></i>
                                Upraviť</a>
                        </button>
                        <button style="margin: 5px 0 5px 0" class="btn btn-custom2" data-bs-toggle="modal" data-bs-target="#myModal{{ $post->id }}">
                            <i class="bi bi-trash3-fill btn-icon-padding"></i>
                            Vymazať
                        </button>
                    </div>
                @endif
            </div>

            <div id="myModal{{ $post->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Potvrdenie vymazania</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Naozaj chceš vymazať príspevok od postavy {{ $post->character->name }} {{ $post->character->surname }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Späť</button>
                            <form id="form-delete-{{ $post->id }}" action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-custom1" onclick="deletePost({{ $post->id }})">Vymazať</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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

    <script>
        function deletePost(postId) {
            document.getElementById('form-delete-' + postId).submit();
        }
    </script>
    <script src="../js/form-validation.js"></script>
    <script src="../js/dynamic-textarea.js"></script>
</body>
</html>
