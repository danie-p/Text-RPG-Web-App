<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Obyvatelia</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
</head>

<body class="dark">
    <div class="header header-blue">
        <h1 class="header-title title title-light">Obyvatelia</h1>
        <img id="header-img" src="images/header_cropped2.png" alt="Header">
        @include('partials.nav')
    </div>

    <div id="content-subpage">
        <div class="container-citizens">
            @foreach ($characters as $character)
                <p><a id="citizen" href="/show-character/{{ $character->id }}">{{ $character->name }} {{ $character->surname }}</a></p>
            @endforeach
        </div>

        @include('partials.footer')
    </div>

    @include('partials.login')
    @include('partials.edit-profile')

    <script src="../js/form-validation.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
