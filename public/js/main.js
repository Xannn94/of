$(document).ready(function() {

    // Gallery list
    $('.gallery-list').imagesLoaded( function() {
        $('.gallery-list').masonry({
            itemSelector: '.gallery-list__item',
            singleMode: true,
            isResizable: true,
            transitionDuration: 0,
        });
        $('.gallery-list__loading-message').hide();
    });

    // Gallery full
    $('.gallery-full').imagesLoaded( function() {
        $('.gallery-full__list').masonry({
            itemSelector: '.gallery-full__item',
            singleMode: true,
            isResizable: true,
            transitionDuration: 0,
            rel: 'gallery',
        });
        $('.gallery-full__loading-message').hide();
    });
    $('.gallery-full__image a').fancybox();

    // Gallery block
    $('.gallery-block__image a').fancybox();


});
