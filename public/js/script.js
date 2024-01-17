document.addEventListener('DOMContentLoaded', function () {
    var btnLogin = document.getElementById('login-b');
    if (btnLogin) {
        btnLogin.addEventListener('click', function () {
            document.querySelector(".popup").classList.add("active");
        });

        document.querySelector(".popup .close-btn").addEventListener("click", function () {
            document.querySelector(".popup").classList.remove("active");
        });
    }

    var btnEditProfile = document.getElementById('btn-edit-profile');
    if (btnEditProfile) {
        btnEditProfile.addEventListener('click', function () {
            document.querySelector(".popup-edit").classList.add("active");
        });

        document.querySelector(".popup-edit .close-btn").addEventListener("click", function () {
            document.querySelector(".popup-edit").classList.remove("active");
        });

        // zobrazenie poli na upravu hesla
        var editPasswdText = document.getElementById('edit-passwd');
        if (editPasswdText) {
            editPasswdText.addEventListener("click", function () {
                editPasswdText.style.display = 'none';
                document.querySelectorAll(".show-edit-passwd").forEach(element => {
                    element.classList.add("active");
                    var passwdInput = element.querySelector('input[type="password"]');
                    if (passwdInput) {
                        passwdInput.required = true;
                        passwdInput.minLength = 8;
                    }
                });
            });
        }

        // skrytie poli na upravu hesla
        var closeEditPasswd = document.querySelector('.close-btn-passwd');
        if (closeEditPasswd) {
            closeEditPasswd.addEventListener("click", function () {
                editPasswdText.style.display = 'block';
                document.querySelectorAll(".show-edit-passwd").forEach(element => {
                    element.classList.remove("active");
                    var passwdInput = element.querySelector('input[type="password"]');
                    if (passwdInput) {
                        passwdInput.required = false;
                        passwdInput.removeAttribute('minlength');
                    }
                });
            })
        }
    }
});

/*
prevzatý kód preložený z CoffeeScript do JavaScript
https://medium.com/@patrickwestwood/how-to-make-multi-layered-parallax-illustration-with-css-javascript-2b56883c3f27
*/
window.addEventListener('scroll', function(event) {
    var depth, i, layer, layers, len, movement, topDistance, translate3d;
    topDistance = this.scrollY;
    layers = document.querySelectorAll("[data-type='parallax']");
    for (i = 0, len = layers.length; i < len; i++) {
        layer = layers[i];
        depth = layer.getAttribute('data-depth');
        movement = -(topDistance * depth);
        translate3d = 'translate3d(0, ' + movement + 'px, 0)';
        layer.style['-webkit-transform'] = translate3d;
        layer.style['-moz-transform'] = translate3d;
        layer.style['-ms-transform'] = translate3d;
        layer.style['-o-transform'] = translate3d;
        layer.style.transform = translate3d;
    }
});
