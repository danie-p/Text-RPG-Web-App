$(document).ready(function(){
    const myInputs = document.querySelectorAll('[id^="myInput"]');

    myInputs.forEach(myInput => {
        /*
        Kód na vyhľadávanie checkboxov prevzatý z https://www.w3schools.com/bootstrap/bootstrap_filters.asp#
        */
        $(myInput).on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    const filterForm = $('#filter-form');

    const closeBtnAuthor = document.querySelector('.close-btn');
    closeBtnAuthor.addEventListener("click", function () {
        const formCheckInputs = document.querySelectorAll('.form-check-input');
        formCheckInputs.forEach(formCheckInput => {
            formCheckInput.checked = false;
        });

        filterForm.submit();
    })

    filterForm.on('change', function() {
        filterForm.submit();
    });

    filterForm.on('submit', function (event) {
        event.preventDefault();

        let authors = [];
        addFilteredPosts(authors, 'filter-author')

        let characters = [];
        addFilteredPosts(characters, 'filter-character');

        let quests = [];
        addFilteredPosts(quests, 'filter-quest');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/roleplay/filter',
            data: {
                authors: authors,
                characters: characters,
                quests: quests
            },
            dataType: 'json',
            success: function (data) {
                showFilteredPosts(data);
            },
            error: function (error) {
                console.log('Error: ', error);
            }
        })
    });
});

function showFilteredPosts(postIds) {
    const contPosts = document.getElementById('container-posts');
    contPosts.querySelectorAll('.post').forEach(post => {
        post.style.display = 'none';
    })

    postIds.forEach(function (postId) {
        document.getElementById('post-' + postId.id).style.display = 'block';
    })
}

function addFilteredPosts(array, formId) {
    const formChecks = document.getElementById(formId).querySelectorAll('.form-check');
    formChecks.forEach(formCheck => {
        if (formCheck.querySelector('.form-check-input').checked) {
            array.push(formCheck.querySelector('.form-check-input').dataset.number);
        }
    });

    // ak neboli vybrane ziadne polozky z danej kategorie, nefiltruje sa podla tejto kategorie => zobrazia sa prispevky od vsetkych druhov v kategorii
    if (array.length === 0) {
        formChecks.forEach(formCheck => {
            array.push(formCheck.querySelector('.form-check-input').dataset.number);
        });
    }
}
