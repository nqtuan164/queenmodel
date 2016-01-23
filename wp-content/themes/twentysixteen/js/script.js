jQuery.noConflict();
(function( $ ) {
  $(document).ready(function () {
    var swiperHome = new Swiper('.models-slide', {
        nextButton: '.swiper-models-slide-next',
        prevButton: '.swiper-models-slide-prev',
        paginationClickable: true,
        spaceBetween: 20,
        slidesPerColumn: 2,
        slidesPerView: 5,

    });

    var swiperPartner = new Swiper('.partners-slide', {
        nextButton: '.swiper-partner-slide-next',
        prevButton: '.swiper-partner-slide-prev',
        paginationClickable: true,
        spaceBetween: 20,
        slidesPerView: 5,

    });
    
    
    var swiperDetail = new Swiper('.main-profile-img-list', {
        nextButton: '.swiper-detail-slide-next',
        prevButton: '.swiper-detail-slide-prev',
        paginationClickable: true,
        spaceBetween: 10,
        slidesPerView: 7,

    });
    
    $(".fancybox").fancybox();
});
})(jQuery);
