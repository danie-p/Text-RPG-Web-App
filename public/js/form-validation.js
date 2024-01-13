window.onload = () => {
    const forms = document.querySelectorAll('.needs-validation');

    /*
    Kód prevzatý z https://getbootstrap.com/docs/5.3/forms/validation/?#custom-styles
     */
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
}
