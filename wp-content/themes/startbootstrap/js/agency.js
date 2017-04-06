// Agency Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    });

    // Call onScroll() function when scroll
    $(document).on("scroll", onScroll);

})(jQuery); // End of use strict



function onScroll(event){
    var scrollPos = $(document).scrollTop();
    if(scrollPos < 50){
        $("#mainNav").removeClass("affix");
        $("#mainNav").addClass("affix-top");
    }else{
        $("#mainNav").removeClass("affix-top");
        $("#mainNav").addClass("affix");
    }
}
