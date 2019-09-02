$(function() {

    "use strict";

    var window_width = $(window).width();

    /*Preloader*/
    $(window).load(function () {
        setTimeout(function () {
            $('body').addClass('loaded');
        }, 200);
    });


    // Search class for focus
    $('.header-search-input').focus(
        function () {
            $(this).parent('div').addClass('header-search-wrapper-focus');
        }).blur(
        function () {
            $(this).parent('div').removeClass('header-search-wrapper-focus');
        });
});

