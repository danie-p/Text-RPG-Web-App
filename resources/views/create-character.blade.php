<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | Vytvor si postavu</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/character.css') }}">
</head>

<body class="register-body">
    @auth
    <div class="container-navbar">
        @include('partials.nav')
    </div>

    <div class="window-container">
        <div class="register-window">
            <div class="login-form">
                <h2>Vytvor si postavu</h2>
                <form class="needs-validation" novalidate action="{{ route('create-character') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row" style="margin-bottom: 15px">
                            <div class="col-md-6">
                                <img id="image" alt="Character Image Placeholder" style="object-position: center bottom" src="https://cdn.openart.ai/stable_diffusion/20768f5a316b8cb9d202d3815cfcba9e1a96ca90_2000x2000.webp">
                            </div>
                            <div class="col-md-6">
                                <div class="row row-height">
                                    <div class="col-md-12">
                                        <div id="name" class="login-form-el" data-bs-theme="dark">
                                            <label for="create-character-name">Meno</label>
                                            <input name="name" id="create-character-name" type="text" placeholder="Zadaj meno" class="bg-light form-control" required>
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
                                            <input name="surname" id="create-character-surname" type="text" placeholder="Zadaj priezvisko" class="bg-light form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-md-12">
                                        <div id="age" class="login-form-el" data-bs-theme="dark">
                                            <label for="create-character-age">Vek</label>
                                            <input name="age" id="create-character-age" type="number" placeholder="Zadaj vek" class="bg-light form-control" required min="1">
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
                                            <input name="image_url" id="create-character-image-url" type="url" placeholder="Zadaj url adresu obrázka" class="bg-light form-control" required>
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
                                    <textarea name="bio" id="create-character-bio" type="text" placeholder="Napíš životopis" class="bg-light form-control" required minlength="300"></textarea>
                                    <div class="invalid-feedback">
                                        Zadaj, prosím, životopis o dĺžke najmenej 300 znakov.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="description" class="login-form-el" data-bs-theme="dark">
                                    <label for="create-character-description">Opis</label>
                                    <textarea name="description" id="create-character-description" type="text" placeholder="Opíš postavu" class="bg-light form-control" required minlength="300"></textarea>
                                    <div class="invalid-feedback">
                                        Zadaj, prosím, opis o dĺžke najmenej 300 znakov.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="container-flex cont-flex2 login-form-el">
                                <button type="submit" class="btn btn-custom4 submit-textarea" style="margin-right: 0">Vytvoriť postavu</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')
    @include('partials.edit-profile')

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
