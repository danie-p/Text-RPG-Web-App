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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/character.css') }}">
</head>

<body class="register-body">
    <div class="container-navbar">
        @include('partials.nav')
    </div>

    <div class="window-container">
    <div class="show-window">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-6">
                    <img alt="Character Image" id="image-show" src={{ $character->image_url }}>
                </div>
                <div id="top-right" class="col-md-6">
                    <div class="row row-height">
                        <div class="col-md-12">
                            <label>Meno</label>
                            <h3 id="create-character-name">{{ $character->name }} {{ $character->surname }}</h3>
                        </div>
                    </div>
                    <div class="row row-height">
                        <div class="col-md-12">
                            <label>Vek</label>
                            <h3 id="create-character-age">{{ $character->age }} rokov</h3>
                        </div>
                    </div>
                    <div class="row row-height">
                        <div class="col-md-12">
                            <label>Používateľ</label>
                            <h3 id="create-character-age">{{ $character->user->name }}</h3>
                        </div>
                    </div>
                    <div class="row row-height" style="margin-bottom: 10px">
                        <div class="col-md-12">
                            <h2 id="create-character-age">{{ $character->quote }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 0" class="row">
                <div class="col-md-6">
                    <label>Životopis</label>
                    <p id="create-character-bio">{!! nl2br(e($character->bio)) !!}</p>
                </div>
                <div class="col-md-6">
                    <label>Opis</label>
                    <p id="create-character-bio">{!! nl2br(e($character->description)) !!}</p>
                </div>
            </div>
            @auth
                <div class="container-flex cont-flex2">
                    @if(Auth::user()->id == $character['user_id'] || Auth::user()->hasPermissionTo('edit-any-character'))
                        <a href="/edit-character/{{ $character->id }}">
                            <button style="margin: 5px 10px 5px 0; align-items: center" class="btn btn-custom4">
                                <i class="bi bi-feather btn-icon-padding"></i>
                                Upraviť
                            </button>
                        </a>
                    @endif
                    @if(Auth::user()->id == $character['user_id'] || Auth::user()->hasPermissionTo('delete-any-character'))
                        <button style="margin: 5px 0 5px 0; align-items: center" class="btn btn-custom3" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="bi bi-trash3-fill btn-icon-padding"></i>
                            Vymazať
                        </button>
                    @endif
                </div>

                @if(Auth::user()->id == $character['user_id'] || Auth::user()->hasPermissionTo('delete-any-character'))
                    <div id="myModal" class="modal fade modal-char" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Potvrdenie vymazania</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Naozaj chceš vymazať postavu {{ $character->name }} {{ $character->surname }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Späť</button>
                                    <form id="form-delete" action="/delete-character/{{ $character->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-custom1" onclick="deleteCharacter()">Vymazať</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    </div>

    <div class="alert-box-sticky">
        @include('partials.alerts')
    </div>
    @include('partials.footer')
    @include('partials.login')
    @include('partials.edit-profile')

    <script src="../js/show-character.js"></script>
    <script>
        function deleteCharacter() {
            document.getElementById('form-delete').submit();
        }
    </script>
    <script src="../js/script.js"></script>
</body>
</html>
