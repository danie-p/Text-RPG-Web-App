<div class="popup">
    <div class="close-btn">&times;</div>
    <div class="login-form">
        <h2>Prihlásenie</h2>
        <form id="login-form" class="needs-validation" novalidate action="/login" method="POST">
            @csrf
            <div class="login-form-el" data-bs-theme="dark">
                <label for="username">Prihlasovacie meno</label>
                <input name="login-name" type="text" id="username" placeholder="Zadaj prihlasovacie meno" class="bg-dark form-control" required>
                <div class="invalid-feedback">
                    Zadaj, prosím, svoje prihlasovacie meno.
                </div>
            </div>
            <div class="login-form-el" data-bs-theme="dark">
                <label for="password">Heslo</label>
                <input name="login-password" type="password" id="password" placeholder="Zadaj heslo" class="bg-dark form-control" required>
                <div class="invalid-feedback">
                    Zadaj, prosím, svoje heslo.
                </div>
            </div>
            <div class="login-form-el">
                <button class="btn btn-custom">Prihlásiť sa</button>
            </div>
            <div class="login-form-el">
                <p>Ešte nemáš účet? <a href="{{ route('register-page') }}">Zaregistruj sa!</a></p>
            </div>
        </form>
    </div>
</div>
