$(document).ready(function(){


    /*
    Kód na vyhľadávanie checkboxov prevzatý z https://www.w3schools.com/bootstrap/bootstrap_filters.asp#
     */
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
