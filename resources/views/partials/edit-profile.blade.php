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
