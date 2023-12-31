<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | Registrácia</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body class="register-body">
    <div class="register-window">
        <div class="login-form">
            <h2>Úprava príspevku</h2>
            <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Príspevok</label>
                    <textarea name="body" class="form-control" rows="5" required minlength="10">{{ $post->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Priložiť súbor</label>
                    <input name="image" class="form-control" value="{{ $post->image }}" type="file" id="formFile">
                </div>
                <div class="input-group mb-3 input-quest">
                    <label class="input-group-text">Splnenie questu</label>
                    <select name="quest" class="form-select">
                        <option selected>{{ $post->image }}</option>
                        <option value="1">Quest 1</option>
                        <option value="2">Quest 2</option>
                        <option value="3">Quest 3</option>
                    </select>
                </div>
                <button class="btn btn-custom">Uložiť zmeny</button>
            </form>
        </div>
    </div>
</body>
</html>
