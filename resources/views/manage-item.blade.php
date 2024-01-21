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
        @if (Auth::user()->hasPermissionTo('manage-item'))
            <div class="container-navbar">
                @include('partials.nav')
            </div>

            <div class="window-container">
                <div class="register-window">
                    <div class="login-form">
                        <h2>Vytvor predmet</h2>
                        <form class="needs-validation" novalidate action="{{ route('create-item') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container-fluid">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row row-height">
                                                <div class="login-form-el" data-bs-theme="dark" style="min-width: 240px">
                                                    <label for="create-item-name">Názov</label>
                                                    <input name="name" id="create-item-name" type="text" placeholder="Zadaj názov" class="bg-light form-control" required>
                                                    <div class="invalid-feedback">
                                                        Zadaj, prosím, názov predmetu.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-height">
                                                <div class="mb-3" data-bs-theme="dark" style="width: 60%; min-width: 135px">
                                                    <label for="create-item-category">Kategória</label>
                                                    <select name="category_id" id="create-item-category" class="form-select" required>
                                                        <option disabled selected value>Vybrať kategóriu</option>
                                                        @foreach($itemCategories as $itemCategory)
                                                            <option value="{{ $itemCategory->id }}">{{ $itemCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="login-form-el" data-bs-theme="dark">
                                                    <label for="create-item-price">Cena</label>
                                                    <input name="price" id="create-item-price" type="number" placeholder="Zadaj cenu" class="bg-light form-control" required min="0" step="0.01"  style="width: 60%;">
                                                    <div class="invalid-feedback">
                                                        Zadaj, prosím, cenu predmetu.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="login-form-el" data-bs-theme="dark">
                                                    <label for="create-item-effect">Efekt</label>
                                                    <input name="effect" id="create-item-effect" type="text" placeholder="Zadaj efekt" class="bg-light form-control" required>
                                                    <div class="invalid-feedback">
                                                        Zadaj, prosím, efekt predmetu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <div class="row row-height">
                                        <div class="mb-3 login-form-el" data-bs-theme="light">
                                            <label for="create-item-image-path">Obrázok</label>
                                            <input name="image_path" id="create-item-image-path" class="form-control" type="file">
                                            <div class="invalid-feedback">
                                                Vyber, prosím, obrázok.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/3d49c67e-7a08-47a8-b5eb-d3bc6b773099/dfbzzwd-9679d467-0ba0-4ddc-9c05-ff8969c9433c.png/v1/fit/w_828,h_638,q_70,strp/dawn_at_the_alchemist_shop_by_nimostar_dfbzzwd-414w-2x.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9OTg1IiwicGF0aCI6IlwvZlwvM2Q0OWM2N2UtN2EwOC00N2E4LWI1ZWItZDNiYzZiNzczMDk5XC9kZmJ6endkLTk2NzlkNDY3LTBiYTAtNGRkYy05YzA1LWZmODk2OWM5NDMzYy5wbmciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.o2UIqPqSep9SLerz4m_GJfXi6XiEtmVbCHHG5hPcsqw"  alt="Create Item Image" style="object-fit: cover; width: 100%; height: 238px">
                                     </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="container-flex cont-flex2 login-form-el">
                                            <button type="submit" class="btn btn-custom4 submit-textarea" style="margin-right: 0">Vytvoriť predmet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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

    <script src="../js/form-validation.js"></script>
    <script src="../js/dynamic-textarea.js"></script>
</body>
</html>
