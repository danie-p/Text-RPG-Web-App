document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.needs-validation');
    window.addEventListener('resize', handleResize);
    window.addEventListener('load', handleResize)
    form.addEventListener('submit', handleResize);
    form.addEventListener('input', handleResize);
});

// dynamicka zmena vysky obrazku postavy
function handleResize() {
    const rows = document.querySelectorAll('.row-height');
    const img = document.querySelector('img');
    var colHeight = 0;
    rows.forEach(row => {
        colHeight += row.offsetHeight;
    })
    img.style.height = colHeight;
}
