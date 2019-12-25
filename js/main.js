$(function() {
    'use strict';
    $('.container header .menu .menu-item').click(function(event) {
        /* Act on the event */
        // event.preventDefault();
        $('.grid').isotope({ filter: "." + $(this).text().replace(/\s/g, '') });


        $('.container header .menu .menu-item').each(function() {
            $(this).css({
                color: "#404351",

            });
        });
        $(this).css({
            color: "#1e2026",

        });
    });
});