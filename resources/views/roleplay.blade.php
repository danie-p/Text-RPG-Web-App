<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aetheria | Roleplay - Hrad</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filter.css') }}">
</head>

<body class="rp-body">
    @auth
    <div class="container">
        <div class="container-navbar">
            @include('partials.nav')
        </div>
        <h1 class="rp-title title-headerless title-light">Roleplay - Hrad</h1>

        <div class="first-section">
            <label for="rp-post" class="form-label">Príspevok</label>
            <form id="rp-post" class="needs-validation" novalidate action="/create-post" method="POST">
                @csrf
                <div class="input-group mb-3 input-quest" style="z-index: 0">
                    <select name="character" class="form-select" required style="z-index: 0">
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
                    <textarea name="body" class="form-control" rows="7" placeholder="Tu píš svoj príbeh" required minlength="300"></textarea>
                    <div class="invalid-feedback">
                        Zadaj, prosím, príspevok o dĺžke najmenej 300 znakov.
                    </div>
                </div>
                <div class="input-group mb-3 input-quest" data-bs-theme="dark">
                    <select name="quest" class="form-select">
                        <option selected>Splniť quest - žiadny</option>
                        @foreach($quests as $quest)
                            @if($quest->location === "Hrad")
                                <option>{{ $quest->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-custom5 submit-textarea">Odoslať</button>
            </form>
        </div>

        <form id="filter-form" class="needs-validation" novalidate action="/filter-posts" method="POST">
            @csrf
            <div class="flex-center">
                <i class="bi bi-filter"></i>
                <div class="dropdown">
                    <button class="btn btn-custom1 dropdown-toggle" type="button" data-bs-toggle="dropdown">Autor
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <input class="form-control" id="myInputUser" type="text" placeholder="Vyhľadaj autora..">
                        <div id="filter-author" class="dropdown-menu-scrollable">
                            @foreach($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultUser{{ $user->id }}" data-number="{{ $user->id }}">
                                    <label class="form-check-label" for="flexCheckDefaultUser{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-custom1 dropdown-toggle" type="button" data-bs-toggle="dropdown">Postava
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <input class="form-control" id="myInputCharacter" type="text" placeholder="Vyhľadaj postavu..">
                        <div id="filter-character" class="dropdown-menu-scrollable">
                            @foreach($allCharacters as $characterOfAll)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultCharacter{{ $characterOfAll->id }}" data-number="{{ $characterOfAll->id }}">
                                    <label class="form-check-label" for="flexCheckDefaultCharacter{{ $characterOfAll->id }}">
                                        {{ $characterOfAll->name }} {{ $characterOfAll->surname }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-custom1 dropdown-toggle" type="button" data-bs-toggle="dropdown">Quest
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <input class="form-control" id="myInputQuest" type="text" placeholder="Vyhľadaj quest..">
                        <div id="filter-quest"  class="dropdown-menu-scrollable">
                            @foreach($quests as $quest)
                                @if($quest->location === "Hrad")
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefaultQuest{{ $quest->id }}" data-number="{{ $quest->id }}">
                                        <label class="form-check-label" for="flexCheckDefaultQuest{{ $quest->id }}">
                                            {{ $quest->name }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </ul>
                </div>

                <button class="btn btn-custom2 close-btn" type="button">
                    <i class="bi bi-x-circle"></i>
                    Zrušiť filtre
                </button>
            </div>
        </form>

        <div id="container-posts">
            @foreach ($posts as $post)
                <div id="post-{{ $post->id }}" class="post">
                    <div id="hide-on-edit-{{ $post->id }}" class="first-section">
                        <div class="container-flex">
                            <div style="flex: 1;" class="rp-header">
                                <b style="font-size: 22px">
                                    <span id="post-char-name-{{ $post->id }}">{{ $post->character->name }}</span>
                                    <span id="post-char-surname-{{ $post->id }}">{{ $post->character->surname }}</span>
                                </b>
                                <span id="post-user-name-{{ $post->id }}" style="margin-left: 10px">{{ $post->user->name }}</span>
                            </div>
                            <div style="text-align: right; color: rgba(68, 141, 145, 1)" class="rp-header">
                                <b style="font-size: 22px"></b>
                                <span id="post-update-time-{{ $post->id }}">{{ \Carbon\Carbon::parse($post->updated_at)->format('d M Y H:i') }}</span>
                            </div>
                        </div>
                        <div id="post-body-{{ $post->id }}" class="rp-text">
                            <p>
                                {!! nl2br(e($post['body'])) !!}
                            </p>
                        </div>

                        <div class="container-flex cont-flex1">
                            <span id="quest" style="flex: 1; display: flex; margin-left: 10px">
                                <iconify-icon
                                    @if($post->quest_id != null)
                                        style="display: inline;"
                                    @else
                                        style="display: none;"
                                    @endif
                                    id="icon-quest-{{ $post->id }}" icon="teenyicons:bookmark-solid"></iconify-icon>
                                <span id="post-quest-{{ $post->id }}" style="margin-left: 5px; color: #E0AC52">
                                    @if($post->quest_id != null)
                                    <b>Splnený quest - </b>{{ $post->quest->name }}
                                    @endif
                                </span>
                            </span>
                            @if(Auth::user()->id == $post['user_id'] || Auth::user()->hasPermissionTo('edit-any-post') || Auth::user()->hasPermissionTo('delete-any-post'))
                                <span style="margin-top: 10px">
                                    @if(Auth::user()->id == $post['user_id'] || Auth::user()->hasPermissionTo('edit-any-post'))
                                        <button id="btn-edit-{{ $post->id }}" data-postid="{{ $post->id }}" style="margin-right: 10px" class="btn btn-custom1 btn-edit">
                                            <i class="bi bi-feather btn-icon-padding"></i>
                                            Upraviť
                                        </button>
                                    @endif
                                    @if(Auth::user()->id == $post['user_id'] || Auth::user()->hasPermissionTo('delete-any-post'))
                                        <button style="margin: 5px 0 5px 0" class="btn btn-custom2" data-bs-toggle="modal" data-bs-target="#myModal{{ $post->id }}">
                                            <i class="bi bi-trash3-fill btn-icon-padding"></i>
                                            Vymazať
                                        </button>
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>

                    <div id="show-on-edit-{{ $post->id }}" style="display: none">
                        <div class="login-form">
                            <form id="edit-form-{{ $post->id }}" class="needs-validation" novalidate action="/edit-post/{{ $post->id }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="body" class="form-control" rows="7" required minlength="300">{{ $post->body }}</textarea>
                                    <div class="invalid-feedback">
                                        Zadaj, prosím, príspevok o dĺžke najmenej 300 znakov.
                                    </div>
                                </div>
                                <div class="input-group mb-3 input-quest" data-bs-theme="dark">
                                    <select name="character" class="form-select" required>
                                        <option selected>{{ $post->character->name }}</option>
                                        @foreach($characters as $character)
                                            @if($character->name !== $post->character->name)
                                                <option>{{ $character->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Vyber, prosím, postavu.
                                    </div>
                                </div>
                                <div class="input-group mb-3 input-quest" data-bs-theme="dark">
                                    <select name="quest" class="form-select">
                                        @if($post->quest_id)
                                            <option selected>{{ $post->quest->name }}</option>
                                            <option>Splniť quest - žiadny</option>
                                            @foreach($quests as $quest)
                                                @if($quest->location === "Hrad" && $quest->name !== $post->quest->name)
                                                    <option>{{ $quest->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option selected>Splniť quest - žiadny</option>
                                            @foreach($quests as $quest)
                                                @if($quest->location === "Hrad")
                                                    <option>{{ $quest->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button id="btn-edit-save-{{ $post->id }}" data-postid="{{ $post->id }}" type="submit" class="btn btn-custom1">
                                    <i class="bi bi-feather btn-icon-padding"></i>
                                    Uložiť zmeny
                                </button>
                            </form>
                        </div>
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
                </div>
            @endforeach
        </div>
    </div>

    <div id="not-found" class="container-fluid" style="display: none; margin-top: 20px">
        <p class="text-center">Neboli nájdené žiadne výsledky!</p>
    </div>

    <div style="margin-top: 20px">
        @include('partials.footer')
    </div>

    @include('partials.edit-profile')

    @else
    <div class="container-fluid">
        <h1 class="no-access">Nepovolený vstup!</h1>
    </div>
    @endauth

    <script src="../js/filter.js"></script>
    <script>
        function deletePost(postId) {
            document.getElementById('form-delete-' + postId).submit();
        }
    </script>
    <script src="../js/form-validation.js"></script>
    <script src="../js/edit-post.js"></script>
</body>
</html>
