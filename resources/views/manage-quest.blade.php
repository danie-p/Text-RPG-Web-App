<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | Vytvor quest</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/character.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body class="register-body">
@auth
    @if (Auth::user()->hasPermissionTo('manage-quest'))
        <div class="container-navbar">
            @include('partials.nav')
        </div>

        <div class="window-container">
            <div class="register-window">
                <div class="login-form">
                    <h2>Vytvor quest</h2>
                    <form class="needs-validation" novalidate action="{{ route('create-quest') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row row-height">
                                            <div class="login-form-el" data-bs-theme="dark" style="min-width: 240px">
                                                <label for="create-quest-name">Názov</label>
                                                <input name="name" id="create-quest-name" type="text" placeholder="Zadaj názov" class="bg-light form-control" required>
                                                <div class="invalid-feedback">
                                                    Zadaj, prosím, názov questu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-height">
                                            <div class="mb-3" data-bs-theme="dark" style="width: 60%; min-width: 135px">
                                                <label for="create-quest-location">Lokácia</label>
                                                <select name="location" id="create-quest-location" class="form-select" required>
                                                    <option disabled selected value>Vybrať lokáciu</option>
                                                    <option >Les</option>
                                                    <option>Hrad</option>
                                                    <option>Podhradie</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Vyber, prosím, lokáciu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-height">
                                            <div class="mb-3 login-form-el" data-bs-theme="light">
                                                <label for="create-character-image-path">Obrázok</label>
                                                <input name="image_path" id="create-character-image-path" class="form-control" type="file">
                                                <div class="invalid-feedback">
                                                    Vyber, prosím, obrázok.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <img id="img1" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2d3c2e86-6d7f-47c3-a363-0f311e463d9a/dcmolm2-508145dc-e987-4891-83a8-0e0b0a9910ce.jpg/v1/fill/w_1024,h_488,q_75,strp/exploring_a_new_district_by_ncorva_dcmolm2-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NDg4IiwicGF0aCI6IlwvZlwvMmQzYzJlODYtNmQ3Zi00N2MzLWEzNjMtMGYzMTFlNDYzZDlhXC9kY21vbG0yLTUwODE0NWRjLWU5ODctNDg5MS04M2E4LTBlMGIwYTk5MTBjZS5qcGciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.LMPRaWRNGRAQPUZpzZdOejJSyYOF1918brwBJH3f0oU" alt="Create Quest Image" style="object-fit: cover; width: 100%; height: 258px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div id="body" class="login-form-el" data-bs-theme="dark">
                                        <label for="create-quest-body">Zadanie</label>
                                        <textarea name="body" id="create-quest-body" rows="6" type="text" placeholder="Napíš zadanie" class="bg-light form-control" required></textarea>
                                        <div class="invalid-feedback">
                                            Zadaj, prosím, zadanie questu.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="container-flex cont-flex2 login-form-el">
                                <button type="submit" class="btn btn-custom4 submit-textarea" style="margin-right: 0">Vytvoriť quest</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="window-container">
            <div class="register-window">
                <div class="login-form">
                    <h2>Odstráň quest</h2>
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <img id="img2" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2d3c2e86-6d7f-47c3-a363-0f311e463d9a/dcn5qww-a1529c7c-dd39-4c46-a846-9684e6d24f78.jpg/v1/fill/w_1024,h_488,q_75,strp/settlers_of_the_fallen_city_by_ncorva_dcn5qww-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NDg4IiwicGF0aCI6IlwvZlwvMmQzYzJlODYtNmQ3Zi00N2MzLWEzNjMtMGYzMTFlNDYzZDlhXC9kY241cXd3LWExNTI5YzdjLWRkMzktNGM0Ni1hODQ2LTk2ODRlNmQyNGY3OC5qcGciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.g4zZvSgbvM9kPmq9a6MHMdGNesdevRpBDtNB6Xy9RvQ" alt="Delete Quest Image" style="object-fit: cover; width: 100%; height: 222px">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row row-height2" style="margin-bottom: 0">
                                        <div data-bs-theme="dark">
                                            <label for="delete-quest">Quest na odstránenie</label>
                                            <select name="name" id="delete-quest" class="form-select" size="5" required style="margin-bottom: 0">
                                                <option disabled selected value="">Vybrať quest</option>
                                                @foreach($quests as $quest)
                                                    <option data-quest-id="{{ $quest->id }}">{{ $quest->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="delete-invalid-feedback" style="display: none; color: #E0AC52; font-size: 17px; margin-top: 4px">
                                                Vyber, prosím, odstraňovaný quest.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-height2">
                                        <div class="container-flex cont-flex2 login-form-el" style="margin-top: 1rem">
                                            <button id="btn2" type="submit" class="btn btn-custom4 submit-textarea" style="margin-right: 0" data-bs-toggle="modal" data-bs-target="#myModal" onclick="openModal()">
                                                Odstrániť quest
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->hasPermissionTo('manage-quest'))
            <div id="myModal" class="modal fade modal-char" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Potvrdenie vymazania</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Naozaj chceš odstrániť quest <span id="modal-quest-name"></span>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Späť</button>
                            <form id="form-delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="btn3" type="button" class="btn btn-custom1" onclick="deleteQuest()">Vymazať</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="alert-box-sticky">
            @include('partials.alerts')
        </div>
        @include('partials.footer')
        @include('partials.edit-profile')

    @else
        <div class="container-fluid">
            <h1 class="no-access">Nepovolený vstup!</h1>
        </div>
    @endif
@else
    <div class="container-fluid">
        <h1 class="no-access">Nepovolený vstup!</h1>
    </div>
@endauth

<script>
    function openModal() {
        var selectedOption = document.getElementById('delete-quest');
        var selectedQuestId = selectedOption.options[selectedOption.selectedIndex].getAttribute('data-quest-id');
        document.getElementById('modal-quest-name').innerText = selectedOption.value;
        document.getElementById('form-delete').action = '/delete-quest/' + selectedQuestId;
        if (selectedOption.value !== "") {
            document.getElementById('delete-invalid-feedback').style.display = 'none';
        } else {
            document.getElementById('delete-invalid-feedback').style.display = 'block';
        }
    }

    function deleteQuest() {
        var selectedOption = document.getElementById('delete-quest');
        if (selectedOption.value !== "") {
            document.getElementById('form-delete').submit();
        }
    }
</script>
<script src="../js/form-validation.js"></script>
<script src="../js/quest.js"></script>
<script src="../js/dynamic-textarea.js"></script>
</body>
</html>
