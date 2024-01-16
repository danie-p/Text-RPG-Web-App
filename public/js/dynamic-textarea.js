document.addEventListener('DOMContentLoaded', function () {
    const textareas = document.querySelectorAll('textarea');
    const forms = document.querySelectorAll('.needs-validation');

    Array.from(textareas).forEach(textarea => {
        textarea.addEventListener('keyup', event => dynamicResize(textarea));
        window.addEventListener('resize', event => dynamicResize(textarea));
        window.addEventListener('load', event => dynamicResize(textarea));

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => dynamicResize(textarea));
        });
    });
});

function dynamicResize(textarea) {
    if (textarea.scrollHeight + 2 < window.innerHeight) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight + 2) + 'px';
        console.log("height: " + textarea.style.height);
    } else {
        textarea.style.height = window.innerHeight;
    }
}
