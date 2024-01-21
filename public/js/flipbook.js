$("#flipbook").turn({
    autoCenter: true,
    duration: 1500,
    when: {
        turning: function (event, page, view) {
            // Check if the user is turning to the last page
            if (page === $('#flipbook').turn('pages')) {
                // Prevent turning to the last page
                event.preventDefault();
            }
        }
    }
});

$("#flipbook").bind("turned", function(event, page, view) {
    if (page === 2) {
        console.log("pridavam fixed first")
        document.getElementById("fixed-front").classList.add("fixed");
    }

    if (page === $("#flipbook").turn("pages") - 1) {
        console.log("pridavam fixed last")
        document.getElementById("fixed-back").classList.add("fixed");
    }
});

$("#flipbook").bind("turning", function(event, page, view) {
    if (page === 1) {
        console.log("odoberam fixed first")
        document.getElementById("fixed-front").classList.remove("fixed");
    }

    if (page === $("#flipbook").turn("pages") - 1) {
        console.log("odoberam fixed last")
        document.getElementById("fixed-back").classList.remove("fixed");
    }
});
