document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.needs-validation');
    window.addEventListener('resize', handleResize);
    window.addEventListener('load', handleResize)
    form.addEventListener('submit', handleResize);
    form.addEventListener('input', handleResize);

    const btn2 = document.getElementById('btn2');
    btn2.addEventListener('click', handleResize2);
    const btn3 = document.getElementById('btn3');
    btn3.addEventListener('click', handleResize2);
    window.addEventListener('resize', handleResize2);
    window.addEventListener('load', handleResize2)
});

// dynamicka zmena vysky obrazku postavy
function handleResize() {
    const rows1 = document.querySelectorAll('.row-height');
    const img1 = document.getElementById('img1');
    var colHeight = 0;
    rows1.forEach(row => {
        colHeight += row.offsetHeight;
    })
    img1.style.height = colHeight;
}

function handleResize2() {
    const rows2 = document.querySelectorAll('.row-height2');
    const img2 = document.getElementById('img2');
    var colHeight = 0;
    rows2.forEach(row => {
        colHeight += row.offsetHeight;
    })
    img2.style.height = colHeight - 15;
}
